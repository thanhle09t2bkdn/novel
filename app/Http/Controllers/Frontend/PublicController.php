<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Repositories\PostRepository;
use Illuminate\Support\Facades\Log;

class PublicController extends Controller
{

    private $postRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
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
}
