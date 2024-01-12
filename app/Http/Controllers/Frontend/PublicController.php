<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use App\Repositories\TagRepository;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class PublicController extends Controller
{
    use SEOToolsTrait;

    private $postRepository;
    private $categoryRepository;
    private $tagRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct(PostRepository $postRepository, CategoryRepository $categoryRepository, TagRepository $tagRepository)
    {
        $this->postRepository = $postRepository;
        $this->categoryRepository = $categoryRepository;
        $this->tagRepository = $tagRepository;
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
        $list = $this->postRepository->where('category_id', $category->id)->paginate();
        return view('frontend.public.category', compact('category', 'list'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function tag(string $slug, Request $request)
    {
        $tag = $this->tagRepository->getByColumn($slug, 'slug');
        $this->seo()->setTitle($tag->name);
        $list = $tag->posts()->paginate();
        return view('frontend.public.tag', compact('tag', 'list'));
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

    public function search(Request $request)
    {

        $this->seo()->setTitle('Search');
        $searchName = $request->get('name');
        $list = $this->postRepository->searchName($searchName)->paginate();
        return view('frontend.public.search', compact('searchName', 'list'));
    }
}
