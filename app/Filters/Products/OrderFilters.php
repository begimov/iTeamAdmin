<?php

namespace App\Filters\Products;

use App\Filters\FiltersAbstract;
use App\Filters\Products\Order\PaymentTypeFilter;
use App\Filters\Products\Order\PaymentStateFilter;
use App\Filters\Products\Order\CreatedAtOrderBy;
use App\Filters\Products\Order\IdOrderBy;
use App\Filters\Products\Order\SearchFilter;

class OrderFilters extends FiltersAbstract
{
    protected $filters = [
        // 'paymentType' => PaymentTypeFilter::class,
        // 'paymentState' => PaymentStateFilter::class,
        'created_at' => CreatedAtOrderBy::class,
        'id' => IdOrderBy::class,
        // 'searchQuery' => SearchFilter::class,
    ];
}
