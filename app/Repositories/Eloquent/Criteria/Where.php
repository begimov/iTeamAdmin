<?php

namespace App\Repositories\Eloquent\Criteria;

use App\Repositories\Criteria\CriterionInterface;

class Where implements CriterionInterface
{
    protected $column;

    protected $value;

    public function __construct($column, $value)
    {
        $this->column = $column;
        $this->value = $value;
    }
    
    public function apply($entity)
    {
        return $entity->where($this->column, $this->value);
    }
}