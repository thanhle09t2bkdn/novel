<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Repositories\AudioRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use Illuminate\Support\Facades\Log;

class PublicController extends Controller
{

    private $postRepository;
    private $categoryRepository;
    private $audioRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct(PostRepository $postRepository, CategoryRepository $categoryRepository, AudioRepository $audioRepository)
    {
        $this->postRepository = $postRepository;
        $this->categoryRepository = $categoryRepository;
        $this->audioRepository = $audioRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $books = $this->postRepository->where('type', Post::BOOK_TYPE)->limit(3)->orderBy('created_at', 'desc')->get();
        $posts = $this->postRepository->where('type', Post::POST_TYPE)->limit(3)->orderBy('created_at', 'desc')->get();
        return view('frontend.public.index', compact('books', 'posts'));
    }

    public function single(string $slug)
    {
        $post = $this->postRepository->where('slug', $slug)->first();
        $relatedPosts = $this->postRepository
            ->where('type', $post->type)
            ->where('category_id', $post->category_id)
            ->where('id', $post->id, '!=')
            ->orderBy('created_at', 'desc')
            ->get();

        $recentPosts = $this->postRepository
            ->where('type', Post::POST_TYPE)
            ->where('id', $post->id, '!=')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        return view('frontend.public.single', compact('post', 'relatedPosts', 'recentPosts'));
    }

    public function article()
    {
        try {
            $list = $this->postRepository
                ->where('type', Post::POST_TYPE)
                ->orderBy('created_at', 'desc')
                ->paginate();

            return view('frontend.public.article', compact('list'));
        } catch (Exception $exception) {
            Log::error($exception);
            abort(500);
        }
    }

    public function book()
    {
        try {
            $list = $this->postRepository
                ->where('type', Post::BOOK_TYPE)
                ->orderBy('created_at', 'desc')
                ->paginate();

            return view('frontend.public.book', compact('list'));
        } catch (Exception $exception) {
            Log::error($exception);
            abort(500);
        }
    }

    public function topic(string $slug)
    {
        $category = $this->categoryRepository->where('slug', $slug)->first();
        try {
            $list = $this->postRepository
                ->where('type', Post::POST_TYPE)
                ->where('category_id', $category->id)
                ->orderBy('created_at', 'desc')
                ->paginate();

            return view('frontend.public.topic', compact('list', 'category'));
        } catch (Exception $exception) {
            Log::error($exception);
            abort(500);
        }
    }


    public function audio(string $slug)
    {
        $audio = $this->audioRepository->where('slug', $slug)->first();
        $relatedAudios = $this->audioRepository
            ->where('post_id', $audio->post_id)
            ->where('id', $audio->id, '!=')
            ->orderBy('created_at', 'desc')
            ->get();
        $recentPosts = $this->postRepository
            ->where('type', Post::POST_TYPE)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        return view('frontend.public.audio', compact('audio', 'relatedAudios', 'recentPosts'));
    }

    public function postAudio(string $slug)
    {
        $post = $this->postRepository
            ->where('slug', $slug)
            ->first();
        $list = $this->audioRepository->where('post_id', $post->id)
            ->orderBy('created_at')
            ->paginate(1);
        $recentPosts = $this->postRepository
            ->where('type', Post::POST_TYPE)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        return view('frontend.public.post_audio', compact('list', 'recentPosts', 'post'));
    }
}
