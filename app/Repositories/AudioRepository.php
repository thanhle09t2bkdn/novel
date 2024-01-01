<?php


namespace App\Repositories;


use App\Models\Audio;

class AudioRepository extends BaseRepository
{
    /**
     * Attribute searchable
     *
     * @var array
     */
    protected $fieldSearchable = [
        'id' => ['column' => 'posts.id', 'operator' => '='],
        'name' => ['column' => 'posts.name', 'operator' => 'like'],
    ];

    public function __construct(Audio $model)
    {
        $this->model = $model;
    }

}
