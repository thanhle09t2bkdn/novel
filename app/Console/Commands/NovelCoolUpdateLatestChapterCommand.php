<?php

namespace App\Console\Commands;

use App\Repositories\ChapterRepository;
use App\Repositories\PostRepository;
use HungCP\PhpSimpleHtmlDom\HtmlDomParser;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class NovelCoolUpdateLatestChapterCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:novel-cool-update-latest-chapter';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Novel Cool Update Latest Chapter';
    private $postRepository;
    private $chapterRepository;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(PostRepository     $postRepository,
                                ChapterRepository  $chapterRepository)
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

        Log::info('NovelCoolCommandSTART: Latest Chapter');
        $posts = $this->postRepository->orderBy('name')->get();
        foreach ($posts as $post) {
            try {
                $content = Http::withHeaders([
                    'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3',
                ])->get($post->link);
                $dom = HtmlDomParser::str_get_html($content->body());
                $dataVals = $dom->find('.bk-data-val');
                $post->rate = trim($dataVals[1]->text());
                $post->save();
                $elems = $dom->find('.chp-item');
                $newElems = array_reverse(array_slice($elems, 0, 20));
                foreach ($newElems as $svgDom) {
                    $viewNumberObject = $svgDom->find('.chapter-item-views span', 0);
                    $linkObject = $svgDom->find('a', 0);
                    $existedChapter = $this->chapterRepository->getByColumn($linkObject->href, 'link');
                    if (!$existedChapter) {
                        $this->chapterRepository->create([
                            'name' => trim($linkObject->title),
                            'view_number' => str_replace(',', '', $viewNumberObject->innertext),
                            'link' => $linkObject->href,
                            'post_id' => $post->id,
                        ]);
                    }

                }
            } catch (\Exception $e) {
                Log::error('Error Sub Chapter:', [$e->getMessage()]);
            }
        }
        Log::info('NovelCoolCommandEND: Latest Chapter');
        return 0;
    }
}
