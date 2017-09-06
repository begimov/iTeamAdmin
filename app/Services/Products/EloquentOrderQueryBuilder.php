<?php

namespace App\Services\Products;

class EloquentOrderQueryBuilder
{
    protected $query;

    public function __construct($model)
    {
        $this->query = $model::query();
    }

    public function filterBy(array $filterParams)
    {
        if (empty($filterParams)) {
            return $this;
        }
        foreach ($filterParams as $key => $ids) {
            $this->query->whereIn($key, $ids);
        }
        return $this;
    }

    public function orderBy(array $orderByParams)
    {
        if (empty($orderByParams)) {
            return $this;
        }
        foreach ($orderByParams as $parameter => $value) {
            $this->query->orderBy($parameter, $value);
        }
        return $this;
    }

    public function search($searchQuery, $relation, array $columns = ['email'])
    {
        $firstColumn = array_shift($columns);

        $this->query->whereHas($relation, function ($query) use ($searchQuery, $columns, $firstColumn) {
          array_reduce($columns, function($newQuery, $column) use ($searchQuery) {
              return $newQuery->orWhere($column, 'like', "%{$searchQuery}%");
          }, $query->where($firstColumn, 'like', "%{$searchQuery}%"));
        });

        return $this;
    }

    public function with(array $relations)
    {
        $this->query->with($relations);
        return $this;
    }

    public function build()
    {
        return $this->query;
    }

}
