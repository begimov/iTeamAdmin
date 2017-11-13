<?php

namespace App\Repositories\Eloquent\Criteria;

use App\Repositories\Criteria\CriterionInterface;

class OrderBy implements CriterionInterface
{
    protected $column;
    protected $order;

    public function __construct($column, $order)
    {
        $this->column = $column;
        $this->order = $order;
    }

    public function apply($entity)
    {
        return $entity->orderBy($this->column, $this->order);
    }
}
