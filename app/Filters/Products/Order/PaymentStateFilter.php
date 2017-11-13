<?php

namespace App\Filters\Products\Order;

use App\Filters\FilterAbstract;
use App\Repositories\Eloquent\Criteria\OrWhere;

class PaymentStateFilter extends FilterAbstract
{
    public function filter($repository, $values)
    {
        foreach ($values as $value) {
            $repository = $repository
                ->withCriteria([
                    new OrWhere('payment_state_id', $this->resolveFilterValue($value))
                ]);
        }
        return $repository;
    }
}
