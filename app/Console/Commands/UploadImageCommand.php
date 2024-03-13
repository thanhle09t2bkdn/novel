<?php

namespace App\Console\Commands;

use App\Repositories\PostRepository;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class UploadImageCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:upload-image';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Upload SVG';
    private $postRepository;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(PostRepository $postRepository)
    {
        parent::__construct();
        $this->postRepository = $postRepository;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Log::info('START:Upload file');
        do {
            $posts = $this->postRepository
                ->where('storage_link', null, '=')
                ->paginate(100);
            foreach ($posts as $post) {
                try {
                    $content = Http::withHeaders([
                        'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3',
                    ])->get($post->image);
                    $imageName = $post->slug . '.jpg';
                    Storage::disk()->put('public/photos/shares/images/' . $imageName, $content->body());
                    $post->storage_link = env('APP_URL') . '/storage/photos/shares/images/' . $imageName;
                    $post->save();
                } catch (\Exception $e) {
                    Log::error('Error:', [$e->getMessage()]);
                    continue;
                }

            }
        } while (count($posts));
        Log::info('END:Upload file');

        return 0;
    }
}
