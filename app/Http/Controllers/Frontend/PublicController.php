<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\AdvertisementRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ChapterRepository;
use App\Repositories\PostRepository;
use App\Repositories\TagRepository;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class PublicController extends Controller
{
    use SEOToolsTrait;

    private $postRepository;
    private $categoryRepository;
    private $tagRepository;
    private $advertisementRepository;
    private $chapterRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct(PostRepository          $postRepository,
                                CategoryRepository      $categoryRepository,
                                AdvertisementRepository $advertisementRepository,
                                ChapterRepository       $chapterRepository,
                                TagRepository           $tagRepository)
    {
        $this->postRepository = $postRepository;
        $this->categoryRepository = $categoryRepository;
        $this->tagRepository = $tagRepository;
        $this->advertisementRepository = $advertisementRepository;
        $this->chapterRepository = $chapterRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->seo()->setTitle('Home');
        $slidePosts = $this->postRepository->orderBy('view_number', 'desc')->limit(8)->get();
        $bestPost = $this->postRepository->orderBy('view_number', 'desc')->first();
        $popularPosts = $this->postRepository->orderBy('view_number', 'desc')->limit(8)->get();
        $latestChapters = $this->chapterRepository->latestChapters()->limit(20)->get();
        return view('frontend.public.index', compact('popularPosts', 'bestPost', 'slidePosts', 'latestChapters'));
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
        $list = $this->postRepository->where('category_id', $category->id)->paginate()->onEachSide(1);
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
        $list = $tag->posts()->paginate(20)->onEachSide(1);
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
        if (!$post) {
            throw (new ModelNotFoundException)->setModel(get_class($this->postRepository->makeModel()));
        }
        $post->view_number++;
        $post->save();
        $chapters = $this->chapterRepository
            ->where('post_id', $post->id)
            ->where('content', null, '!=')
            ->orderBy('id')
            ->paginate()
            ->onEachSide(1);

        $latestChapters = $this->chapterRepository
            ->where('post_id', $post->id)
            ->where('content', null, '!=')
            ->orderBy('id', 'desc')
            ->limit(10)->get();
        $this->seo()->setTitle($post->name);
        $this->seo()->setDescription($post->short_description);
        $tags = $post->tags;
        $tagKeywords = [];
        foreach ($tags as $tag) {
            $tagKeywords[] = $tag->name;
        }
        $this->seo()->metatags()->addKeyword($tagKeywords);
        $this->seo()->metatags()->addMeta('article:published_time', $post->created_at->toW3CString(), 'property');
        $relatedPosts = [];
        if (count($post->tags)) {
            $relatedPosts = $this->postRepository
                ->findTagId($post->tags[0]->id)
                ->where('posts.id', '!=', $post->id)
                ->orderBy('view_number', 'desc')
                ->limit(8)
                ->get();
        }
        return view('frontend.public.svg', compact('post', 'relatedPosts', 'tags', 'chapters', 'latestChapters'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function chapter(string $slug, Request $request)
    {
        $chapter = $this->chapterRepository->getByColumn($slug, 'slug');
        if (!$chapter) {
            throw (new ModelNotFoundException)->setModel(get_class($this->chapterRepository->makeModel()));
        }
        $chapter->view_number++;
        $chapter->save();
        $post = $chapter->post;
        $post->view_number++;
        $request->session()->put('current_chapter_id', $chapter->id);
        $post->save();
        try {
            $nextChapter = $this->chapterRepository
                ->where('id', $chapter->id, '>')
                ->where('post_id', $chapter->post_id)
                ->where('content', null, '!=')
                ->orderBy('id', 'asc')->first();
        } catch (ModelNotFoundException $exception) {
            $nextChapter = null;
        }
        $this->chapterRepository->unsetClauses();
        try {
            $previousChapter = $this->chapterRepository
                ->where('id', $chapter->id, '<')
                ->where('post_id', $chapter->post_id)
                ->where('content', null, '!=')
                ->orderBy('id', 'desc')->first();
        } catch (ModelNotFoundException $exception) {
            $previousChapter = null;
        }
        $this->seo()->setTitle($chapter->name);
        $this->seo()->metatags()->addMeta('article:published_time', $chapter->created_at->toW3CString(), 'property');
        $this->seo()->metatags()->addMeta('article:section', $post->name, 'property');
        $nativeBanner = $this->advertisementRepository->getByColumn('native-banner', 'name');
        return view('frontend.public.chapter', compact('chapter', 'nextChapter', 'previousChapter', 'nativeBanner'));
    }

    public function search(Request $request)
    {

        $this->seo()->setTitle('Search');
        $searchName = $request->get('name');
        $list = $this->postRepository->searchName($searchName)->paginate()->onEachSide(1);
        return view('frontend.public.search', compact('searchName', 'list'));
    }

    public function download($id, $storageLink = '')
    {
        $post = $this->postRepository->getById($id);
        if (!$storageLink) {
            $content = Http::withHeaders([
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3',
            ])->get($post->image);
            return response($content->body());
        }
        return response(file_get_contents(env('SVG_HOST') . '/svg/' . $post->storage_link));

    }

    public function tags()
    {
        $this->seo()->setTitle('Genre List');
        $tags = $this->tagRepository->orderBy('name')->get();
        return view('frontend.public.tags', compact('tags'));
    }


    public function latest(Request $request)
    {
        $this->seo()->setTitle('Latest Novel');
        $list = $this->postRepository->orderBy('created_at', 'desc')->paginate()->onEachSide(1);
        return view('frontend.public.latest', compact('list'));
    }

    public function hot(Request $request)
    {
        $this->seo()->setTitle('Hot Novel');
        $list = $this->postRepository->orderBy('view_number', 'desc')->paginate()->onEachSide(1);
        return view('frontend.public.hot', compact('list'));
    }

    public function completed(Request $request)
    {
        $this->seo()->setTitle('Completed Novel');
        $list = $this->postRepository->orderBy('created_at', 'desc')->paginate()->onEachSide(1);
        return view('frontend.public.completed', compact('list'));
    }

    public function popular(Request $request)
    {
        $this->seo()->setTitle('Most Popular Novel');
        $list = $this->postRepository->orderBy('view_number', 'desc')->paginate()->onEachSide(1);
        return view('frontend.public.popular', compact('list'));
    }

    public function history(Request $request)
    {
        $this->seo()->setTitle('History Novel');
        $chapterId = $request->session()->get('current_chapter_id');
        $chapter = null;
        if ($chapterId) {
            $chapter = $this->chapterRepository->where('id', $chapterId)->first();
        }
        return view('frontend.public.history', compact('chapter'));
    }
}
