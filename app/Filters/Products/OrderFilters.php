<?php

namespace App\Filters\Products;

use App\Filters\FiltersAbstract;
use App\Filters\Products\Order\PaymentTypeFilter;

class OrderFilters extends FiltersAbstract
{
    protected $filters = [
        'paymentType' => PaymentTypeFilter::class,
    ];
}
