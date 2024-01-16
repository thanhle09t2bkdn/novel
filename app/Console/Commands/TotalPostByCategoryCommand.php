<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use Illuminate\Console\Command;

class TotalPostByCategoryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:total-category';
    private $postRepository;
    private $categoryRepository;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Total Category';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(PostRepository     $postRepository,
                                CategoryRepository $categoryRepository)
    {
        parent::__construct();
        $this->postRepository = $postRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $categories = $this->categoryRepository->all();
        foreach ($categories as $category) {
            $category->item_total = Post::where('category_id', $category->id)->count();
            $category->save();
        }
        return 0;
    }
}
