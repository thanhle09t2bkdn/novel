<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Repositories\ChapterRepository;
use App\Repositories\PostRepository;
use App\Repositories\TagRepository;
use HungCP\PhpSimpleHtmlDom\HtmlDomParser;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ScribbleHubChapterCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:scribble-hub-chapter';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scribble Hub Chapter';
    private $postRepository;
    private $chapterRepository;
    private $tagRepository;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(PostRepository    $postRepository,
                                TagRepository     $tagRepository,
                                ChapterRepository $chapterRepository)
    {
        parent::__construct();
        $this->postRepository = $postRepository;
        $this->chapterRepository = $chapterRepository;
        $this->tagRepository = $tagRepository;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        Log::info('Scribble Hub Chapter START:');
        do {
            $posts = $this->postRepository
                ->where('description', null)
                ->where('type', Post::SCRIBBLE_HUB_TYPE)
                ->orderBy('name')
                ->paginate(200);
            foreach ($posts as $post) {
                try {
                    $content = Http::withHeaders([
                        'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3',
                    ])->get($post->link);
                    $dom = HtmlDomParser::str_get_html($content->body());
                    $descriptionObject = $dom->find('.wi_fic_desc', 0);
                    $imageObject = $dom->find('.fic_image img', 0);
                    $post->description = $descriptionObject->text();

                    $post->short_description = Str::limit($descriptionObject->text(), 100) . '...';
                    $post->image = $imageObject->src;
                    $post->save();
                    $elems = $dom->find('.toc_a');
                    $newElems = array_reverse($elems);
                    foreach ($newElems as $linkObject) {
                        $this->chapterRepository->create([
                            'name' => trim($linkObject->innertext),
                            'link' => $linkObject->href,
                            'post_id' => $post->id,
                        ]);
                    }

                    $tagIds = [];
                    $tags = $dom->find('.fic_genre');
                    foreach ($tags as $tag) {
                        $tagModel = $this->tagRepository->getByColumn(trim($tag->text()), 'name');
                        if (!$tagModel) {
                            $tagModel = $this->tagRepository->create(['name' => trim($tag->text())]);
                        }
                        $tagIds[] = $tagModel->id;

                    }
                    $post->tags()->attach(array_unique($tagIds));
                } catch (\Exception $e) {
                    $post->author = 'error';
                    $post->save();
                    Log::error('Error:', [$e->getMessage()]);
                }
            }
        } while (count($posts));

        Log::info('Scribble Hub Chapter END:');
        return 0;
    }
}
