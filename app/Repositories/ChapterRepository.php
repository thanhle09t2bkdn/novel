<?php


namespace App\Repositories;


use App\Models\Chapter;

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

}
