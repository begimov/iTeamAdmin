<?php

namespace App\Traits;

trait SearchFilterTrait
{
    protected function search($builder, $searchQuery, $relation, array $columns = ['email'])
    {
        $firstColumn = array_shift($columns);

        if (!$relation) {
          $this->buildOrWhereQuery($columns,
              $builder->where($firstColumn, 'like', "%{$searchQuery}%"),
              $searchQuery);
          return $builder;
        }

        $builder->whereHas($relation, function ($query) use ($searchQuery, $columns, $firstColumn) {
          $this->buildOrWhereQuery($columns,
              $query->where($firstColumn, 'like', "%{$searchQuery}%"),
              $searchQuery);
        });
        return $builder;
    }

    protected function buildOrWhereQuery(array $columns, $firstQuery, $searchQuery)
    {
        array_reduce($columns, function($newQuery, $column) use ($searchQuery) {
            return $newQuery->orWhere($column, 'like', "%{$searchQuery}%");
        }, $firstQuery);
    }
}