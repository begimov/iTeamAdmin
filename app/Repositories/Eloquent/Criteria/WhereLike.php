<?php

namespace App\Repositories\Eloquent\Criteria;

use App\Repositories\Criteria\CriterionInterface;

class WhereLike implements CriterionInterface
{
    protected $column;
    protected $query;

    public function __construct($column, $query)
    {
        $this->column = $column;
        $this->query = $query;
    }

    public function apply($entity)
    {
        return $entity->where($this->column, 'like', "%{$this->query}%");
    }
}
