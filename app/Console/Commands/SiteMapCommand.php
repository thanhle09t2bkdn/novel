<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use App\Repositories\TagRepository;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;

class SiteMapCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'SiteMap Create';
    private $postRepository;
    private $categoryRepository;
    private $tagRepository;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(PostRepository $postRepository, CategoryRepository $categoryRepository, TagRepository $tagRepository)
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
        $sitemap = \App::make('sitemap');
        // add home pages mặc định
        $sitemap->add(URL::to('/most-popular-novel'), Carbon::now(), '1.0', 'daily');
        $sitemap->add(URL::to('/latest-novel'), Carbon::now(), '1.0', 'daily');
        $sitemap->add(URL::to('/genres'), Carbon::now(), '1.0', 'daily');
        $tags = $this->tagRepository->orderBy('created_at')->get();
        foreach ($tags as $tag) {
            $sitemap->add(route('frontend.public.tag', [$tag->slug]), $tag->created_at, '0.6', 'daily');
        }
        $posts = $this->postRepository->orderBy('created_at')->get();
        foreach ($posts as $post) {
            $sitemap->add(route('frontend.public.svg', [$post->slug]), $post->created_at, '0.6', 'daily');
        }

        $sitemap->store('xml', 'sitemap');
        if (File::exists(public_path() . '/sitemap.xml')) {
            chmod(public_path() . '/sitemap.xml', 0777);
        }
        return 0;
    }
}
