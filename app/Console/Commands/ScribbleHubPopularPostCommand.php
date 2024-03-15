<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use App\Repositories\TagRepository;
use HungCP\PhpSimpleHtmlDom\HtmlDomParser;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ScribbleHubPopularPostCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:scribble-hub-popular-post';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scribble Hub Popular Post';
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

        Log::info('ScribbleHubCommandSTART:');
        $categoryModel = $this->categoryRepository->first();
        for ($page = 1; $page <= 2; $page++) {
            Log::info('ScribbleHubCommandEND: page' . $page . PHP_EOL);
            try {
                $content = Http::withHeaders([
                    'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3',
                ])->get('https://www.scribblehub.com/series-ranking/?sort=1&order=4&pg=' . $page);
                $dom = HtmlDomParser::str_get_html($content->body());

                $elems = $dom->find('.search_main_box');
                foreach ($elems as $svgDom) {
                    $imageObject = $svgDom->find('.search_img img', 0);
//                    $viewNumberObject = $svgDom->find('.book-data-num', 0);
                    $rateObject = $svgDom->find('.search_ratings', 0);
                    $linkObject = $svgDom->find('.search_title a', 0);
                    $rate = str_replace('(', '', $rateObject->innertext);
                    $rate = str_replace(')', '', $rate);
                    $authorObject = $dom->find('.a_un_st a', 0);
                    $this->postRepository->create([
                        'name' => trim($linkObject->innertext),
                        'image' => $imageObject->src,
                        'type' => Post::SCRIBBLE_HUB_TYPE,
                        'category_id' => $categoryModel->id,
//                        'view_number' => 0,
                        'link' => $linkObject->href,
                        'rate' => $rate,
                        'author' => $authorObject->innertext
                    ]);
                }
            } catch (\Exception $e) {
                Log::error('Error:', [$e->getMessage()]);
            }
        }
        Log::info('ScribbleHubCommandEND:');
        return 0;
    }
}
