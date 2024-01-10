<?php

namespace App\Console\Commands;

use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use App\Repositories\TagRepository;
use App\Services\CommonService;
use Illuminate\Console\Command;

class PixeliedCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:pixelied';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pixelied';
    private $postRepository;
    private $categoryRepository;
    private $tagRepository;
    private $commonService;
    const CATEGORIES = [
        [
            'name' => 'Heart',
            'key' => 'heart'
        ],
        [
            'name' => 'Sunflower',
            'key' => 'sunflower'
        ],
        [
            'name' => 'Christmas',
            'key' => 'christmas'
        ],
        [
            'name' => 'Butterfly',
            'key' => 'butterfly'
        ],
        [
            'name' => 'Flower',
            'key' => 'flower'
        ],
        [
            'name' => 'Halloween',
            'key' => 'halloween'
        ],
        [
            'name' => 'Disney',
            'key' => 'disney'
        ],
        [
            'name' => 'Football',
            'key' => 'football'
        ],
    ];

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(PostRepository     $postRepository,
                                CategoryRepository $categoryRepository,
                                TagRepository      $tagRepository,
                                CommonService      $commonService)
    {
        parent::__construct();
        $this->postRepository = $postRepository;
        $this->categoryRepository = $categoryRepository;
        $this->tagRepository = $tagRepository;
        $this->commonService = $commonService;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        foreach (self::CATEGORIES as $category) {
            $categoryModel = $this->categoryRepository->getByColumn($category['name'], 'name');
            if (!$categoryModel) {
                $categoryModel = $this->categoryRepository->create(['name' => $category['name'], 'slug' => $category['key']]);
            }
            $page = 1;
            do {
                $response = $this->commonService->get(['query' => $category['name']], 'https://pixelied.com/_next/data/TG7iDyv39WpuXq9uDpf6L/svg.json');
                $responseObject = json_decode($response);
                foreach ($responseObject->pageProps->svgListData->svgList as $svgObject) {
                    $post = $this->postRepository->create([
                        'name' => $svgObject->title,
                        'image' => $svgObject->svg->destination,
                        'category_id' => $categoryModel->id
                    ]);
                    $tagIds = [];
                    foreach ($svgObject->tags as $tag) {
                        $tagModel = $this->tagRepository->getByColumn($tag, 'name');
                        if (!$tagModel) {
                            $tagModel = $this->tagRepository->create(['name' => $tag]);
                        }
                        $tagIds[] = $tagModel->id;

                    }
                    $post->tags()->attach($tagIds);
                }
                $page++;
                if ($responseObject->pageProps->pagination->totalPages < $page) {
                    break;
                }
            } while (true);

        }
        return 0;
    }
}
