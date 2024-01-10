<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use Illuminate\Support\Facades\Log;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class PublicController extends Controller
{
    use SEOToolsTrait;

    private $postRepository;
    private $categoryRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct(PostRepository $postRepository, CategoryRepository $categoryRepository)
    {
        $this->postRepository = $postRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//        $this->seo()->setTitle('Trang Chủ');
        $categories = $this->categoryRepository->all();
        return view('frontend.public.index', compact('categories'));
    }
}
