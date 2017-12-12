<?php

namespace App\Filters\Products\Order;

use App\Filters\FilterAbstract;
use App\Repositories\Eloquent\Criteria\OrWhere;

class PaymentTypeFilter extends FilterAbstract
{
    public function filter($repository, $values)
    {
        foreach ($values as $value) {
            $repository->withCriteria([
                new OrWhere('payment_type_id', $this->resolveFilterValue($value))
            ]);
        }
        return $repository;
    }
}
