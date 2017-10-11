<?php

namespace App\Filters\Products\Order;

use App\Filters\FilterAbstract;

class PaymentTypeFilter extends FilterAbstract
{
    public function filter($builder, $value)
    {
        return $builder->where('payment_type_id', $value);
    }
}
