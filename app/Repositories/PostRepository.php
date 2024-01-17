<?php


namespace App\Repositories;


use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostRepository extends BaseRepository
{
    /**
     * Attribute searchable
     *
     * @var array
     */
    protected $fieldSearchable = [
        'id' => ['column' => 'posts.id', 'operator' => '='],
        'category_id' => ['column' => 'posts.category_id', 'operator' => '='],
        'name' => ['column' => 'posts.name', 'operator' => 'like'],
    ];

    public function __construct(Post $model)
    {
        $this->model = $model;
    }

    public function searchName($name) {
        $query = DB::table('posts')
            ->join('categories', 'categories.id', '=', 'posts.category_id')
            ->join('post_tag', 'post_tag.post_id', '=', 'posts.id')
            ->join('tags', 'tags.id', '=', 'post_tag.tag_id')
            ->select([
                'posts.*',
            ])
            ->orWhere('posts.name', 'like', "%$name%")
            ->orWhere('categories.name', 'like', "%$name%")
            ->orWhere('tags.name', 'like', "%$name%")
            ->groupBy(['posts.id']);
        return $query;
    }

}
