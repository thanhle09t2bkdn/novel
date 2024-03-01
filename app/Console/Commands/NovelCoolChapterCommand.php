<?php

namespace App\Console\Commands;

use App\Repositories\ChapterRepository;
use App\Repositories\PostRepository;
use App\Repositories\TagRepository;
use HungCP\PhpSimpleHtmlDom\HtmlDomParser;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class NovelCoolChapterCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:novel-cool-chapter';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Novel Cool Chapter';
    private $postRepository;
    private $chapterRepository;
    private $tagRepository;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(PostRepository    $postRepository,
                                TagRepository $tagRepository,
                                ChapterRepository $chapterRepository)
    {
        parent::__construct();
        $this->postRepository = $postRepository;
        $this->chapterRepository = $chapterRepository;
        $this->tagRepository = $tagRepository;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        Log::info('NovelCoolCommandSTART:');
        do{
            $posts = $this->postRepository
                ->where('author', null, '=')
                ->orderBy('name', 'desc')
                ->paginate(200);
            foreach ($posts as $post) {
                Log::info('NovelCoolCommandEND: post ' . $post->name . PHP_EOL);
                try {
                    $content = Http::withHeaders([
                        'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3',
                    ])->get($post->link);
                    $dom = HtmlDomParser::str_get_html($content->body());
                    $authorObject =  $dom->find('.bookinfo-author .hover-underline', 0);
                    $dataVals =  $dom->find('.bk-data-val');
                    $post->rate = trim($dataVals[1]->text());
                    $post->view_number = str_replace(',', '', trim($dataVals[2]->text()));
                    $post->author = $authorObject->title;
                    $post->save();
                    $elems = $dom->find('.chp-item');
                    $newElems = array_reverse($elems);
                    foreach ($newElems as $svgDom) {
                        $viewNumberObject = $svgDom->find('.chapter-item-views span', 0);
                        $linkObject = $svgDom->find('a', 0);
                        $this->chapterRepository->create([
                            'name' => trim($linkObject->title),
                            'view_number' => str_replace(',', '', $viewNumberObject->innertext),
                            'link' => $linkObject->href,
                            'post_id' => $post->id,
                        ]);
                    }

                    $tagIds = [];
                    $tags = $dom->find('.bk-cate-item a');
                    foreach ($tags as $tag) {
                        $tagModel = $this->tagRepository->getByColumn(trim($tag->text()), 'name');
                        if (!$tagModel) {
                            $tagModel = $this->tagRepository->create(['name' => trim($tag->text())]);
                        }
                        $tagIds[] = $tagModel->id;

                    }
                    $post->tags()->attach(array_unique($tagIds));
                } catch (\Exception $e) {
                    Log::error('Error:', [$e->getMessage()]);
                }
            }
        }while(count($posts));

        Log::info('NovelCoolCommandEND:');
        return 0;
    }
}
