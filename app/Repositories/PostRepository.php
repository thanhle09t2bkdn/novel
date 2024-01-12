<?php


namespace App\Repositories;


use App\Models\Post;

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

}
