<?php

namespace App\Filters\Products\Order;

use App\Filters\FilterAbstract;

class CreatedAtOrderBy extends FilterAbstract
{
    public function filter($builder, $value, $repository)
    {
        return $builder->orderBy('created_at', $this->resolveFilterValue($value));
    }
}
