<?php

namespace App\Repositories\Eloquent\Criteria;

use App\Repositories\Criteria\CriterionInterface;

class OrWhere implements CriterionInterface
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
        return $entity->orWhere($this->column, $this->value);;
    }
}
