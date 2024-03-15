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

class RoyalRoadPopularPostCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:royal-road-popular-post';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Royal Road Popular Post';
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

        Log::info('RoyalRoadCommandSTART:');
        $categoryModel = $this->categoryRepository->first();
        for ($page = 1; $page <= 2; $page++) {
            Log::info('ScribbleHubCommandEND: page' . $page . PHP_EOL);
            try {
                $content = Http::withHeaders([
                    'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3',
                ])->get('https://www.royalroad.com/fictions/best-rated?page=' . $page);
                $dom = HtmlDomParser::str_get_html($content->body());

                $elems = $dom->find('.fiction-list-item');
                foreach ($elems as $svgDom) {
//                    $viewNumberObject = $svgDom->find('.book-data-num', 0);
                    $rateObject = $svgDom->find('.star', 0);
                    $linkObject = $svgDom->find('.fiction-title a', 0);
                    $imageObject = $svgDom->find('.img-responsive', 0);
                    $descriptionObject = $svgDom->find('.margin-top-10', 0);
                    $this->postRepository->create([
                        'name' => trim($linkObject->innertext),
                        'type' => Post::ROYAL_ROAD_TYPE,
                        'category_id' => $categoryModel->id,
//                        'view_number' => 0,
                        'link' => $linkObject->href,
                        'rate' => $rateObject->title,
                        'image' => $imageObject->src,
                        'description' => $descriptionObject->text(),
                        'short_description' => Str::limit($descriptionObject->text(), 100) . '...',
                    ]);
                }
            } catch (\Exception $e) {
                Log::error('Error:', [$e->getMessage()]);
            }
        }
        Log::info('RoyalRoadCommandEND:');
        return 0;
    }
}
