<?php

namespace App\Console\Commands;

use App\Repositories\CategoryRepository;
use App\Repositories\ChapterRepository;
use App\Repositories\PostRepository;
use App\Repositories\TagRepository;
use HungCP\PhpSimpleHtmlDom\HtmlDomParser;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class NovelCoolChapterDetailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:novel-cool-chapter-detail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Novel Cool Chapter Detail';
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

        Log::info('NovelCoolCommandSTART:');
        $chapters = $this->chapterRepository
            ->where('content', null, '=')
            ->orderBy('name', 'asc')->get();
        foreach ($chapters as $chapter) {
            Log::info('NovelCoolCommandEND: post detail ' . $chapter->name . PHP_EOL);
            try {
                $content = Http::withHeaders([
                    'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3',
                ])->get($chapter->link);
                $dom = HtmlDomParser::str_get_html($content->body());

                $contentObject = $dom->find('.overflow-hidden', 0);
                $replaceTitle = str_replace($chapter->name, '', $contentObject->text());
                $replaceReport = str_replace('Chapter end   Report', '', $replaceTitle);
                $chapter->content = preg_replace("/[\r\n]/", "<p>", $replaceReport);
                $chapter->save();
            } catch (\Exception $e) {
                Log::error('Error:', [$e->getMessage()]);
            }
        }
        Log::info('NovelCoolCommandEND:');
        return 0;
    }
}
