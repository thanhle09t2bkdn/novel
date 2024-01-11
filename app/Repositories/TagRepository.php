<?php


namespace App\Repositories;


use App\Models\Tag;

class TagRepository extends BaseRepository
{
    /**
     * Attribute searchable
     *
     * @var array
     */
    protected $fieldSearchable = [
        'id' => ['column' => 'tags.id', 'operator' => '='],
        'name' => ['column' => 'tags.name', 'operator' => 'like'],
    ];

    public function __construct(Tag $model)
    {
        $this->model = $model;
    }

}
