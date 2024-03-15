<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Repositories\ChapterRepository;
use App\Repositories\PostRepository;
use App\Repositories\TagRepository;
use App\Services\CommonService;
use HungCP\PhpSimpleHtmlDom\HtmlDomParser;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class RoyalRoadChapterCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:royal-road-chapter';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Royal Road Chapter';
    private $postRepository;
    private $chapterRepository;
    private $tagRepository;
    private $commonService;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(PostRepository    $postRepository,
                                TagRepository     $tagRepository,
                                CommonService     $commonService,
                                ChapterRepository $chapterRepository)
    {
        parent::__construct();
        $this->postRepository = $postRepository;
        $this->chapterRepository = $chapterRepository;
        $this->commonService = $commonService;
        $this->tagRepository = $tagRepository;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        Log::info('Royal Road Chapter START:');
        do {
            $posts = $this->postRepository
                ->where('author', null)
                ->where('type', Post::ROYAL_ROAD_TYPE)
                ->orderBy('name')
                ->paginate(200);
            foreach ($posts as $post) {
                try {
                    $content = Http::withHeaders([
                        'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3',
                    ])->get($post->link);
                    $dom = HtmlDomParser::str_get_html($content->body());
                    $authorObject = $dom->find('h4.font-white span a.font-white', 0);
                    $viewNumberObject = $dom->find('.stats-content .font-red-sunglo', 5);
                    $post->author = $authorObject->text();
                    $post->view_number = str_replace(',', '', $viewNumberObject->innertext);
                    $post->save();
                    $elems = $dom->find('.chapter-row');
                    foreach ($elems as $elem) {
                        $linkObject = $elem->find('td a', 0);
                        $this->chapterRepository->create([
                            'name' => trim($linkObject->innertext),
                            'link' => 'https://www.royalroad.com' . $linkObject->href,
                            'post_id' => $post->id,
                        ]);
                    }

                    $tagIds = [];
                    $tags = $dom->find('.margin-bottom-10 .label');
                    foreach ($tags as $tag) {
                        $tagName = ucfirst(trim($tag->text()));
                        $tagModel = $this->tagRepository->getByColumn($tagName, 'name');
                        if (!$tagModel) {
                            $tagModel = $this->tagRepository->create(['name' => $tagName]);
                        }
                        $tagIds[] = $tagModel->id;

                    }
                    $post->tags()->attach(array_unique($tagIds));
                } catch (\Exception $e) {
                    $post->author = 'error';
                    $post->save();
                    Log::error('Error:', [$e->getMessage()]);
                }
                break;
            }
            break;
        } while (count($posts));

        Log::info('Royal Road Chapter END:');
        return 0;
    }
}
