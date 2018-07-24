<?php

namespace App\Filters\Products;

use App\Filters\FiltersAbstract;
use App\Filters\Products\Material\SearchFilter;

class MaterialFilters extends FiltersAbstract
{
    protected $filters = [
        'searchQuery' => SearchFilter::class,
    ];
}
