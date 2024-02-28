<?php


namespace App\Repositories;


use App\Models\Chapter;
use Illuminate\Support\Facades\DB;

class ChapterRepository extends BaseRepository
{

    /**
     * Attribute searchable
     *
     * @var array
     */
    protected $fieldSearchable = [
        'id' => ['column' => 'chapters.id', 'operator' => '='],
        'name' => ['column' => 'chapters.name', 'operator' => 'like'],
    ];

    public function __construct(Chapter $model)
    {
        $this->model = $model;
    }

    public function latestChapters()
    {
        $query = DB::table('chapters')
            ->join('posts', 'posts.id', '=', 'chapters.post_id')
            ->select([
                'chapters.*',
                'posts.name as post_name',
                'posts.image as post_image'
            ])
            ->orderBy('created_at', 'desc');
        return $query;
    }

}
