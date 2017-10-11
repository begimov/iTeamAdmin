<?php

namespace App\Filters\Products;

use App\Filters\FiltersAbstract;
use App\Filters\Products\Order\PaymentTypeFilter;
use App\Filters\Products\Order\PaymentStateFilter;

class OrderFilters extends FiltersAbstract
{
    protected $filters = [
        'paymentType' => PaymentTypeFilter::class,
        'paymentState' => PaymentStateFilter::class,
    ];
}
