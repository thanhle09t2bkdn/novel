<?php

namespace App\Console\Commands;

use App\Models\Chapter;
use App\Models\Post;
use App\Repositories\ChapterRepository;
use App\Repositories\PostRepository;
use HungCP\PhpSimpleHtmlDom\HtmlDomParser;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class RoyalRoadUpdateLatestChapterCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:royal-road-update-latest-chapter';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Royal Road Update Latest Chapter';
    private $postRepository;
    private $chapterRepository;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(PostRepository    $postRepository,
                                ChapterRepository $chapterRepository)
    {
        parent::__construct();
        $this->postRepository = $postRepository;
        $this->chapterRepository = $chapterRepository;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        Log::info('RoyalRoadCommandSTART: Latest Chapter');
        $posts = $this->postRepository
            ->where('type', Post::ROYAL_ROAD_TYPE)
            ->orderBy('name')
            ->get();
        foreach ($posts as $post) {
            try {
                $content = Http::withHeaders([
                    'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3',
                ])->get($post->link);
                $dom = HtmlDomParser::str_get_html($content->body());
                $elems = $dom->find('.chapter-row');
                $offset = 0;
                if (count($elems) < 20) {
                    $offset = 0;
                } else {
                    $offset = count($elems) - 20;
                }
                $newElems = array_slice($elems, $offset, 20);
                foreach ($newElems as $elem) {
                    $linkObject = $elem->find('td a', 0);
                    $existedChapter = $this->chapterRepository->getByColumn($linkObject->href, 'link');
                    if (!$existedChapter) {
                        $this->chapterRepository->create([
                            'name' => $post->name . ' ' . trim($linkObject->innertext),
                            'link' => 'https://www.royalroad.com' . $linkObject->href,
                            'post_id' => $post->id,
                            'type' => Chapter::ROYAL_ROAD_TYPE,
                        ]);
                    }

                }
            } catch (\Exception $e) {
                Log::error('Error Sub Chapter:', [$e->getMessage()]);
            }
        }
        Log::info('RoyalRoadCommandEND: Latest Chapter');
        Artisan::call('command:royal-road-chapter-detail');
        return 0;
    }
}
