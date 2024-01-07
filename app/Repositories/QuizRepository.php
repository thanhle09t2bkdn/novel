<?php


namespace App\Repositories;


use App\Models\Quiz;

class QuizRepository extends BaseRepository
{
    /**
     * Attribute searchable
     *
     * @var array
     */
    protected $fieldSearchable = [
        'id' => ['column' => 'quizzes.id', 'operator' => '='],
        'post_id' => ['column' => 'quizzes.post_id', 'operator' => '='],
        'name' => ['column' => 'quizzes.name', 'operator' => 'like'],
    ];

    public function __construct(Quiz $model)
    {
        $this->model = $model;
    }


    /**
     * searchFromParams
     *
     * @param $request
     *
     * @return mixed
     */
    public function searchFromRequest($request)
    {
        return $this->search($request->only(array_keys($this->fieldSearchable)))
            ->orderBy('created_at')
            ->paginate();
    }

}
