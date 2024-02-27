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
        $categories = $this->categoryRepository->all();
        $banner728x90 = $this->advertisementRepository->getByColumn('728x90_1', 'name');
        return view('frontend.public.index', compact('categories', 'banner728x90'));
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
        $banner160x600 = $this->advertisementRepository->getByColumn('160x600_1', 'name');
        return view('frontend.public.category', compact('category', 'list', 'banner160x600'));
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
        $list = $tag->posts()->paginate(18);
        $banner160x300 = $this->advertisementRepository->getByColumn('160x300_1', 'name');
        return view('frontend.public.tag', compact('tag', 'list', 'banner160x300'));
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function svg(string $slug)
    {
        $post = $this->postRepository->getByColumn($slug, 'slug');
        $chapters = $this->chapterRepository
            ->where('post_id', $post->id)
            ->orderBy('id')
            ->paginate();

        $latestChapters = $this->chapterRepository
            ->where('post_id', $post->id)
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
        $relatedPosts = $this->postRepository
            ->where('type', $post->type)
            ->where('category_id', $post->category_id)
            ->where('id', $post->id, '!=')
            ->orderBy('created_at', 'desc')
            ->limit(16)
            ->get();
        $banner300x250 = $this->advertisementRepository->getByColumn('300x250_1', 'name');
        $banner320x50 = $this->advertisementRepository->getByColumn('320x50_1', 'name');
        return view('frontend.public.svg', compact('post', 'relatedPosts', 'tags', 'banner300x250', 'banner320x50', 'chapters', 'latestChapters'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function chapter(string $slug)
    {
        $chapter = $this->chapterRepository->getByColumn($slug, 'slug');
        if(!$chapter) {
            throw (new ModelNotFoundException)->setModel(get_class($this->chapterRepository->makeModel()));
        }
        try {
            $nextChapter = $this->chapterRepository
                ->where('id', $chapter->id, '>')
                ->where('post_id', $chapter->post_id)
                ->orderBy('id', 'asc')->first();
        } catch (ModelNotFoundException $exception) {
            $nextChapter = null;
        }
        $this->chapterRepository->unsetClauses();
        try {
            $previousChapter = $this->chapterRepository
                ->where('id', $chapter->id, '<')
                ->where('post_id', $chapter->post_id)
                ->orderBy('id', 'desc')->first();
        } catch (ModelNotFoundException $exception) {
            $previousChapter = null;
        }
        $this->seo()->setTitle($chapter->name);
        return view('frontend.public.chapter', compact('chapter', 'nextChapter', 'previousChapter'));
    }

    public function search(Request $request)
    {

        $this->seo()->setTitle('Search');
        $searchName = $request->get('name');
        $list = $this->postRepository->searchName($searchName)->paginate();
        $banner468x60 = $this->advertisementRepository->getByColumn('468x60_1', 'name');
        return view('frontend.public.search', compact('searchName', 'list', 'banner468x60'));
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
}
