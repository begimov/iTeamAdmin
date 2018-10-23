<?php

namespace App\Filters\Products;

use App\Filters\FiltersAbstract;
use App\Filters\Products\Product\{
    SearchFilter,
    CategoryFilter
};

class ProductFilters extends FiltersAbstract
{
    protected $filters = [
        'searchQuery' => SearchFilter::class,
        'categories' => CategoryFilter::class,
    ];
}
