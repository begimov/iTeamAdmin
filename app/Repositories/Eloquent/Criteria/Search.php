<?php

namespace App\Repositories\Eloquent\Criteria;

use App\Repositories\Criteria\CriterionInterface;

class Search implements CriterionInterface
{
    protected $searchQuery;
    protected $relation;
    protected $columns;

    public function __construct($searchQuery, $relation, array $columns = ['email'])
    {
        $this->searchQuery = $searchQuery;
        $this->relation = $relation;
        $this->columns = $columns;
    }

    public function apply($entity)
    {
        $firstColumn = array_shift($this->columns);

        if (!$this->relation) {
            $query = $entity->where($firstColumn, 'like', "%{$this->searchQuery}%");
            $this->buildOrWhereQuery($this->columns, $query, $this->searchQuery);
            return $query;
        }

        $entity->whereHas($this->relation, function ($query) use ($firstColumn) {
          $this->buildOrWhereQuery($this->columns,
              $query->where($firstColumn, 'like', "%{$this->searchQuery}%"),
              $this->searchQuery);
        });
        return $entity;
    }

    protected function buildOrWhereQuery(array $columns, $firstQuery, $searchQuery)
    {
        array_reduce($columns, function($newQuery, $column) use ($searchQuery) {
            return $newQuery->orWhere($column, 'like', "%{$searchQuery}%");
        }, $firstQuery);
    }
}
