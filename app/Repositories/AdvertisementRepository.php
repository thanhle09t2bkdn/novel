<?php


namespace App\Repositories;


use App\Models\Advertisement;

class AdvertisementRepository extends BaseRepository
{
    /**
     * Attribute searchable
     *
     * @var array
     */
    protected $fieldSearchable = [
        'id' => ['column' => 'advertisements.id', 'operator' => '='],
        'name' => ['column' => 'advertisements.name', 'operator' => 'like'],
    ];

    public function __construct(Advertisement $model)
    {
        $this->model = $model;
    }

}
