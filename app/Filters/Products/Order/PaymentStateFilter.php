<?php

namespace App\Filters\Products\Order;

use App\Filters\FilterAbstract;

class PaymentStateFilter extends FilterAbstract
{
    public function filter($builder, $values)
    {
        foreach ($values as $value) {
            $builder->orWhere('payment_state_id', $this->resolveFilterValue($value));
        }
        return $builder;
    }
}
