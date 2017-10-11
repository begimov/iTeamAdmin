<?php

namespace App\Filters\Products\Order;

use App\Filters\FilterAbstract;

class PaymentTypeFilter extends FilterAbstract
{
    public function filter($builder, $values)
    {
        foreach ($values as $value) {
            $builder->orWhere('payment_type_id', $value);
        }
        return $builder;
    }
}
