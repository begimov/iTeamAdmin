<?php

namespace App\Filters\Products\Order;

use App\Filters\FilterAbstract;

class IdOrderBy extends FilterAbstract
{
    public function filter($builder, $value)
    {
        return $builder->orderBy('id', $this->resolveFilterValue($value));
    }
}
