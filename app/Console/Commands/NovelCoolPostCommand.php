<?php

namespace App\Console\Commands;

use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use App\Repositories\TagRepository;
use HungCP\PhpSimpleHtmlDom\HtmlDomParser;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class NovelCoolPostCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:novel-cool';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Novel Cool';
    private $postRepository;
    private $categoryRepository;
    private $tagRepository;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(PostRepository     $postRepository,
                                CategoryRepository $categoryRepository,
                                TagRepository      $tagRepository)
    {
        parent::__construct();
        $this->postRepository = $postRepository;
        $this->categoryRepository = $categoryRepository;
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
        $categoryModel = $this->categoryRepository->first();
        for ($page = 1; $page <= 141; $page++) {
            Log::info('NovelCoolCommandEND: page' . $page . PHP_EOL);
            try {
                $content = Http::withHeaders([
                    'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3',
                ])->get('https://www.novelcool.com/category/index_' . $page . '.html');
                $dom = HtmlDomParser::str_get_html($content->body());

                $elems = $dom->find('.book-item');
                foreach ($elems as $svgDom) {
                    $typeObject = $svgDom->find('.book-type', 0);
                    if ($typeObject->innertext == 'Novel') {
                        $imageObject = $svgDom->find('img', 0);
                        $nameObject = $svgDom->find('.book-name', 0);
                        $descriptionObject = $svgDom->find('.book-summary-content', 0);
                        $viewNumberObject = $svgDom->find('.book-data-num', 0);
                        $rateObject = $svgDom->find('.book-rate-num', 0);
                        $linkObject = $svgDom->find('.book-info a', 0);
                        $post = $this->postRepository->create([
                            'name' => $nameObject->innertext,
                            'image' => $imageObject->src,
                            'description' => $descriptionObject->innertext,
                            'short_description' => Str::limit($descriptionObject->innertext, 100) . '...',
                            'category_id' => $categoryModel->id,
                            'view_number' => str_replace(',', '', $viewNumberObject->innertext),
                            'link' => $linkObject->href,
                            'rate' => $rateObject->innertext,
                        ]);
                        $tagIds = [];
                        $tags = $svgDom->find('.book-tag');
                        foreach ($tags as $tag) {
                            $tagModel = $this->tagRepository->getByColumn($tag->innertext, 'name');
                            if (!$tagModel) {
                                $tagModel = $this->tagRepository->create(['name' => $tag->innertext]);
                            }
                            $tagIds[] = $tagModel->id;

                        }
                        $post->tags()->attach(array_unique($tagIds));
                    }
                }
            } catch (\Exception $e) {
                Log::error('Error:', [$e->getMessage()]);
            }
        }
        Log::info('NovelCoolCommandEND:');
        return 0;
    }
}
