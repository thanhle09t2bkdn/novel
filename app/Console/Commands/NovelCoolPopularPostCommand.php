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

class NovelCoolPopularPostCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:novel-cool-popular-post';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Novel Cool Popular Post';
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

        Log::info('NovelCoolCommandSTART: Popular Post');
        $categoryModel = $this->categoryRepository->first();
        try {
            $content = Http::withHeaders([
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3',
            ])->get('https://www.novelcool.com/category/popular.html');
            $dom = HtmlDomParser::str_get_html($content->body());

            $elems = $dom->find('.book-item');
            foreach ($elems as $svgDom) {
                $typeObject = $svgDom->find('.book-type', 0);
                if ($typeObject->innertext == 'Novel') {
                    $linkObject = $svgDom->find('.book-info a', 0);
                    $existedPost = $this->postRepository->getByColumn($linkObject->href, 'link');
                    if(!$existedPost) {
                        $imageObject = $svgDom->find('img', 0);
                        $nameObject = $svgDom->find('.book-name', 0);
                        $descriptionObject = $svgDom->find('.book-summary-content', 0);

                        $this->postRepository->create([
                            'name' => trim($nameObject->innertext),
                            'image' => $imageObject->getAttribute('lazy_url'),
                            'description' => $descriptionObject->innertext,
                            'short_description' => Str::limit($descriptionObject->innertext, 100) . '...',
                            'category_id' => $categoryModel->id,
                            'link' => $linkObject->href,
                        ]);
                    }

                }
            }
        } catch (\Exception $e) {
            Log::error('Error:', [$e->getMessage()]);
        }
        Log::info('NovelCoolCommandEND: Popular Post');
        return 0;
    }
}
