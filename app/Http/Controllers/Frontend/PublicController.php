<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;
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
        $this->seo()->setTitle('Home');
        $categories = $this->categoryRepository->all();
        return view('frontend.public.index', compact('categories'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function category(string $slug, Request $request)
    {
        $category = $this->categoryRepository->getByColumn($slug, 'slug');
        $this->seo()->setTitle($category->name);
        $request->request->add(['category_id' => $category->id]);
        $list = $this->postRepository->searchFromRequest($request);
        return view('frontend.public.category', compact('category', 'list'));
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function svg(string $slug)
    {
        $post = $this->postRepository->getByColumn($slug, 'slug');
        $this->seo()->setTitle($post->name);
        $relatedPosts = $this->postRepository
            ->where('type', $post->type)
            ->where('category_id', $post->category_id)
            ->where('id', $post->id, '!=')
            ->orderBy('created_at', 'desc')
            ->limit(30)
            ->get();
        return view('frontend.public.svg', compact('post', 'relatedPosts'));
    }
}
