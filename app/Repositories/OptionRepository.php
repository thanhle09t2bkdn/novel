<?php


namespace App\Repositories;


use App\Models\Option;

class OptionRepository extends BaseRepository
{
    /**
     * Attribute searchable
     *
     * @var array
     */
    protected $fieldSearchable = [
        'id' => ['column' => 'options.id', 'operator' => '='],
        'name' => ['column' => 'options.name', 'operator' => 'like'],
    ];

    public function __construct(Option $model)
    {
        $this->model = $model;
    }

}
