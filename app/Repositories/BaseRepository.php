<?php

namespace App\Repositories;


abstract class BaseRepository implements RepositoryContract
{
    /**
     * The repository model.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;
    /**
     * The query builder.
     *
     * @var \Illuminate\Database\Eloquent\Builder
     */
    protected $query;
    /**
     * Alias for the query limit.
     *
     * @var int
     */
    protected $take;
    /**
     * Array of related models to eager load.
     *
     * @var array
     */
    protected $with = [];
    /**
     * Array of one or more where clause parameters.
     *
     * @var array
     */
    protected $wheres = [];
    /**
     * Array of one or more where in clause parameters.
     *
     * @var array
     */
    protected $whereIns = [];
    /**
     * Array of one or more ORDER BY column/value pairs.
     *
     * @var array
     */
    protected $orderBys = [];
    /**
     * Array of scope methods to call on the model.
     *
     * @var array
     */
    protected $scopes = [];

    /**
     * Attribute searchable
     *
     * @var array
     */
    protected $fieldSearchable = [];

    /**
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function makeModel()
    {
        return $this->model;
    }
    /**
     * Get all the model records in the database.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        $this->newQuery()->eagerLoad();
        $models = $this->query->get();
        $this->unsetClauses();
        return $models;
    }

    /**
     * Count the number of specified model records in the database.
     *
     * @return int
     */
    public function count()
    {
        return $this->get()->count();
    }

    /**
     * Get the first specified model record from the database.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function first()
    {
        $this->newQuery()->eagerLoad()->setClauses()->setScopes();
        $model = $this->query->firstOrFail();
        $this->unsetClauses();
        return $model;
    }

    /**
     * Get all the specified model records in the database.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function get()
    {
        $this->newQuery()->eagerLoad()->setClauses()->setScopes();
        $models = $this->query->get();
        $this->unsetClauses();
        return $models;
    }

    /**
     * Get the specified model record from the database.
     *
     * @param $id
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getById($id)
    {
        $this->unsetClauses();
        $this->newQuery()->eagerLoad();
        return $this->query->findOrFail($id);
    }

    /**
     * @param $item
     * @param $column
     * @param array $columns
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function getByColumn($item, $column, array $columns = ['*'])
    {
        $this->unsetClauses();
        $this->newQuery()->eagerLoad();
        return $this->query->where($column, $item)->first($columns);
    }

    /**
     * Delete the specified model record from the database.
     *
     * @param $id
     *
     * @return bool|null
     * @throws \Exception
     */
    public function deleteById($id)
    {
        $this->unsetClauses();
        return $this->getById($id)->delete();
    }

    /**
     * Delete the specified model record from the database.
     *
     * @param $ids
     *
     * @return bool|null
     * @throws \Exception
     */
    public function deleteByIds(array $ids)
    {
        $this->unsetClauses();
        $this->newQuery()->eagerLoad();
        return $this->query->whereIn('id', $ids)->delete();
    }

    /**
     * Set the query limit.
     *
     * @param int $limit
     *
     * @return $this
     */
    public function limit($limit)
    {
        $this->take = $limit;
        return $this;
    }

    /**
     * Set an ORDER BY clause.
     *
     * @param string $column
     * @param string $direction
     * @return $this
     */
    public function orderBy($column, $direction = 'asc')
    {
        $this->orderBys[] = compact('column', 'direction');
        return $this;
    }

    /**
     * @param int $limit
     * @param array $columns
     * @param string $pageName
     * @param null $page
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate($limit = 20, array $columns = ['*'], $pageName = 'page', $page = null)
    {
        $this->newQuery()->eagerLoad()->setClauses()->setScopes();
        $models = $this->query->paginate($limit, $columns, $pageName, $page);
        $this->unsetClauses();
        return $models;
    }

    /**
     * Add a simple where clause to the query.
     *
     * @param string $column
     * @param string $value
     * @param string $operator
     *
     * @return $this
     */
    public function where($column, $value, $operator = '=')
    {
        $this->wheres[] = compact('column', 'value', 'operator');
        return $this;
    }

    /**
     * Add a simple where in clause to the query.
     *
     * @param string $column
     * @param mixed $values
     *
     * @return $this
     */
    public function whereIn($column, $values)
    {
        $values = is_array($values) ? $values : [$values];
        $this->whereIns[] = compact('column', 'values');
        return $this;
    }

    /**
     * Set Eloquent relationships to eager load.
     *
     * @param $relations
     *
     * @return $this
     */
    public function with($relations)
    {
        $this->model = $this->model->with($relations);

        return $this;
    }

    /**
     * Create a new instance of the model's query builder.
     *
     * @return $this
     */
    protected function newQuery()
    {
        $this->query = $this->model->newQuery();
        return $this;
    }

    /**
     * Add relationships to the query builder to eager load.
     *
     * @return $this
     */
    protected function eagerLoad()
    {
        foreach ($this->with as $relation) {
            $this->query->with($relation);
        }
        return $this;
    }

    /**
     * Set clauses on the query builder.
     *
     * @return $this
     */
    protected function setClauses()
    {
        foreach ($this->wheres as $where) {
            $this->query->where($where['column'], $where['operator'], $where['value']);
        }
        foreach ($this->whereIns as $whereIn) {
            $this->query->whereIn($whereIn['column'], $whereIn['values']);
        }
        foreach ($this->orderBys as $orders) {
            $this->query->orderBy($orders['column'], $orders['direction']);
        }
        if (isset($this->take) and !is_null($this->take)) {
            $this->query->take($this->take);
        }
        return $this;
    }

    /**
     * Set query scopes.
     *
     * @return $this
     */
    protected function setScopes()
    {
        foreach ($this->scopes as $method => $args) {
            $this->query->$method(implode(', ', $args));
        }
        return $this;
    }

    /**
     * Reset the query clause parameter arrays.
     *
     * @return $this
     */
    public function unsetClauses()
    {
        $this->wheres = [];
        $this->whereIns = [];
        $this->scopes = [];
        $this->orderBys = [];
        $this->take = null;
        return $this;
    }

    public function create(array $attributes)
    {
        $this->unsetClauses();
        $attributes = $this->model->newInstance()->forceFill($attributes)->makeVisible($this->model->getHidden())->toArray();

        $model = $this->model->newInstance($attributes);
        $model->save();

        return $model;
    }

    public function update(array $attributes, $id)
    {
        $this->unsetClauses();
        $attributes = $this->model->newInstance()->forceFill($attributes)->makeVisible($this->model->getHidden())->toArray();

        $model = $this->model->findOrFail($id);
        $model->fill($attributes);
        $model->save();

        return $model;
    }

    public function whereHas($relation, $closure)
    {
        $this->model = $this->model->whereHas($relation, $closure);

        return $this;
    }

    public function wheres($closure)
    {
        $this->model = $this->model->where($closure);

        return $this;
    }

    public function orWhere($closure)
    {
        $this->model = $this->model->orWhere($closure);

        return $this;
    }

    public function restore($id)
    {
        $this->unsetClauses();
        return $this->model->onlyTrashed()->find($id)->restore();
    }


    public function forceDelete($id)
    {
        $this->unsetClauses();
        return $this->model->withTrashed()->find($id)->forceDelete();
    }

    public function onlyTrashed()
    {
        $this->unsetClauses();
        return $this->model->onlyTrashed();
    }

    /**
     * Search by basic where clause to the query.
     *
     * @param mixed $searchData Data to search.
     * @param bool  $isSearchOr Search "or".
     *
     * @return mixed
     */
    public function search($searchData, $isSearchOr = false)
    {

        $this->unsetClauses();
        $model = $this->model;

        $condition = $isSearchOr ? 'orWhere' : 'where';

        foreach ($searchData as $field => $value) {
            if ($value !== null) {
                $dataSearch = $this->getDataSearch($field);
                $column = $dataSearch['column'];
                $operator = $dataSearch['operator'];
                $type = $dataSearch['type'];

                if ($operator === 'in') {
                    $value = is_string($value) ? explode(",", $value) : $value;
                    $value = array_filter($value, function ($element) {
                        return !(is_null($element) || $element === '');
                    });
                    if ($value) {
                        $model = $model->{$condition . 'In'}($column, $value);
                    }
                } else {
                    if ($type === 'date') {
                        $model = $model->{$condition . 'Date'}($column, $operator, $value);
                    } else {
                        if ($operator === 'like') {
                            $value = '%' . $value . '%';
                        }
                        $model = $model->$condition($column, $operator, $value);
                    }
                }
            }
        }

        return $model;
    }

    /**
     * Get data search
     *
     * @param string $field Field.
     *
     * @return array
     */
    function getDataSearch(string $field)
    {
        $searchable = $this->fieldSearchable[$field] ? $this->fieldSearchable[$field] : [];
        if (!empty($searchable)) {
            $column = array_key_exists('column', $searchable) ? $searchable['column'] : $field;
            $operator = array_key_exists('operator', $searchable) ? $searchable['operator'] : '=';
            $type = array_key_exists('type', $searchable) ? $searchable['type'] : 'normal';
        } else {
            $column = $field;
            $operator = '=';
            $type = 'normal';
        }

        if ($type === 'raw') {
            $column = DB::raw($column);
        }

        if (isset($searchable['column_type'])) {
            $column = DB::raw($column . '::' . $searchable['column_type']);
        }

        return compact('column', 'operator', 'type');
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
            ->orderBy('created_at', 'desc')
            ->paginate();
    }
}
