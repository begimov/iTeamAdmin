<?php

namespace App\Filters\Products\Product;

use App\Filters\FilterAbstract;
use App\Repositories\Eloquent\Criteria\OrderBy;

class IdOrderBy extends FilterAbstract
{
    public function filter($repository, $value)
    {
        return $repository->withCriteria([
            new OrderBy('id', $this->resolveFilterValue($value))
        ]);
    }
}
