<?php

namespace App\Console\Commands;

use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
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
    const CATEGORIES = [
        [
            'name' => 'Heart',
            'key' => 'heart'
        ]
    ];

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(PostRepository $postRepository, CategoryRepository $categoryRepository)
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
        foreach (self::CATEGORIES as $category) {
            $categoryModel = $this->categoryRepository->create(['name' => $category['name'], 'slug' => $category['key']]);
        }
        return 0;
    }
}
