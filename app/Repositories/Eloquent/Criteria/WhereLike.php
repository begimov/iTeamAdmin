<?php

namespace App\Repositories\Eloquent\Criteria;

use App\Repositories\Criteria\CriterionInterface;

class WhereLike implements CriterionInterface
{
    public function apply($entity)
    {
        return $entity;
    }
}
