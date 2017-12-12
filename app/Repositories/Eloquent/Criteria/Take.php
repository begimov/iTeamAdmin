<?php

namespace App\Repositories\Eloquent\Criteria;

use App\Repositories\Criteria\CriterionInterface;

class Take implements CriterionInterface
{
    protected $limit;

    public function __construct($limit)
    {
        $this->limit = $limit;
    }

    public function apply($entity)
    {
        return $entity->take($this->limit);
    }
}
