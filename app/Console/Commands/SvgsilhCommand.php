<?php

namespace App\Console\Commands;

use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use App\Repositories\TagRepository;
use App\Services\CommonService;
use HungCP\PhpSimpleHtmlDom\HtmlDomParser;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class SvgsilhCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:svgsilh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Svgsilh';
    private $postRepository;
    private $categoryRepository;
    private $tagRepository;
    private $commonService;
    const CATEGORIES = [
        'animal',
        'woman',
        'symbol',
        'man',
        'girl',
        'nature',
        'design',
        'flag',
        'isolated',
        'bird',
        'sign',
        'cartoon',
        'flower',
        'art',
        'female',
        'food',
        'vintage',
        'decoration',
        'plant',
        'face',
        'people',
        'tree',
        'frame',
        'love',
        'background',
        'alphabet',
        'decorative',
        'cute',
        'old',
        'fantasy',
        'person',
        'heart',
        'head',
        'happy',
        'abstract',
        'christmas',
        'letter',
        'hand',
        'music',
        'computer',
        'button',
        '3d',
        'mammal',
        'business',
        'fruit',
        'figure',
        'flowers',
        'human',
        'male',
        'gold',
        'arrow',
        'character',
        'floral',
        'boy',
        'drawing',
        'water',
        'orange',
        'sea',
        'glass',
        'wildlife',
        'pattern',
        'comic',
        'leaves',
        'country',
        'wood',
        'ornament',
        'car',
        'sport',
        'leaf',
        'paper',
        'fashion',
        'insect',
        'summer',
        'map',
        'wild',
        'banner',
        'funny',
        'lady',
        'wings',
        'cat',
        'logo',
        'holiday',
        'ball',
        'light',
        'star',
        'young',
        'office',
        'spring',
        'fish',
        'internet',
        'technology',
        'dog',
        'child',
        'hat',
        'game',
        'geometric',
        'tool',
        'metal',
        'vehicle',
        'digital',
        'communication',
        'ocean',
        'shield',
        'halloween',
        'building',
        'retro',
        'web',
        'baby',
        'school',
        'travel',
        'sexy',
        'transportation',
        'letters',
        'border',
        'science',
        'home',
        'hair',
        'box',
        'sports',
        'style',
        'house',
        'drink',
        'note',
        'world',
        'circle',
        'pet',
        'celebration',
        'horse',
        'sweet',
        'flying',
        'animals',
        'shape',
        'healthy',
        'fun',
        'abc',
        'model',
        'equipment',
        'smile',
        'decor',
        'characters',
        'beautiful',
        'rose',
        'book',
        'portrait',
        'smiley',
        'butterfly',
        'warning',
        'network',
        'valentine',
        'scrapbook',
        'easter',
        'fairy',
        'weapon',
        'instrument',
        'dress',
        'information',
        'farm',
        'party',
        'graphic',
        'day',
        'sun',
        'wooden',
        'prismatic',
        'rainbow',
        'garden',
        'sound',
        'play',
        'women',
        'element',
        'label',
        'branch',
        'emblem',
        'health',
        'power',
        'blossom',
        'education',
        'money',
        'road',
        'sketch',
        'eyes',
        'monster',
        'clock',
        'time',
        'fly',
        'scrapbooking',
        'religion',
        'natural',
        'card',
        'biology',
        'phone',
        'round',
        'ancient',
        'earth',
        'antique',
        'chromatic',
        'photo',
        'number',
        'africa',
        'ribbon',
        'creature',
    ];

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(PostRepository     $postRepository,
                                CategoryRepository $categoryRepository,
                                TagRepository      $tagRepository,
                                CommonService      $commonService)
    {
        parent::__construct();
        $this->postRepository = $postRepository;
        $this->categoryRepository = $categoryRepository;
        $this->tagRepository = $tagRepository;
        $this->commonService = $commonService;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        foreach (self::CATEGORIES as $categoryKey) {
            echo 'START:' . $categoryKey . PHP_EOL;
            $categoryName = ucfirst($categoryKey);
            $categoryModel = $this->categoryRepository->getByColumn($categoryName, 'name');
            if (!$categoryModel) {
                $categoryModel = $this->categoryRepository->create(['name' => $categoryName]);
            }
            $page = 1;
            do {
                $content = Http::withHeaders([
                    'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3',
                ])->get('https://svgsilh.com/tag/' . $categoryKey . '-' . $page . '.html');
                $dom = HtmlDomParser::str_get_html($content->body());

                $elems = $dom->find('.card-columns .card');
                foreach ($elems as $svgDom) {
                    $svgObject = $svgDom->find('img.card-img-top', 0);
                    $imageLink = 'https://svgsilh.com' . $svgObject->src;
                    if (!$this->postRepository->getByColumn($imageLink, 'image')) {
                        $post = $this->postRepository->create([
                            'name' => $svgObject->getAttribute('alt'),
                            'image' => $imageLink,
                            'category_id' => $categoryModel->id
                        ]);
                        $tagIds = [];
                        $tags = $svgDom->find('a.text-muted');
                        foreach ($tags as $tag) {
                            $tagModel = $this->tagRepository->getByColumn($tag->innertext, 'name');
                            if (!$tagModel) {
                                $tagModel = $this->tagRepository->create(['name' => $tag->innertext]);
                            }
                            $tagIds[] = $tagModel->id;

                        }
                        $post->tags()->attach(array_unique($tagIds));
                    }
                }
                if(count($elems) < 20) {
                    break;
                }
                $page++;
            } while (true);
            echo 'END:' . $categoryKey . PHP_EOL;
        }
        return 0;
    }
}
