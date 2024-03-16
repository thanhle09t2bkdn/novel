<?php

namespace App\Console\Commands;

use App\Models\Chapter;
use App\Repositories\ChapterRepository;
use App\Repositories\PostRepository;
use HungCP\PhpSimpleHtmlDom\HtmlDomParser;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class RoyalRoadChapterDetailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:royal-road-chapter-detail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Royal Road Chapter Detail';
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

        Log::info('Royal Road Chapter Detail START:');
        do {
            $chapters = $this->chapterRepository
                ->where('content', null, '=')
                ->where('type', Chapter::ROYAL_ROAD_TYPE)
                ->orderBy('id')
                ->paginate(200);
            foreach ($chapters as $chapter) {
                try {
                    $content = Http::withHeaders([
                        'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3',
                    ])->get($chapter->link);
                    $dom = HtmlDomParser::str_get_html($content->body());

                    $contentObject = $dom->find('.chapter-content', 0);
                    $chapter->content = preg_replace("/[\r\n]/", "<p>", $contentObject->text());
                    $chapter->save();
                } catch (\Exception $e) {
                    Log::error('Error:', [$e->getMessage()]);
                }
            }
        } while (count($chapters));

        Log::info('Royal Road Chapter Detail END:');
        return 0;
    }
}
