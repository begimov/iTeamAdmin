<?php

namespace App\Filters\Products;

use App\Filters\FiltersAbstract;
use App\Filters\Products\Product\{
    SearchFilter,
    CategoryFilter,
    IdOrderBy,
    CostFilter
};

class ProductFilters extends FiltersAbstract
{
    protected $filters = [
        'searchQuery' => SearchFilter::class,
        'categories' => CategoryFilter::class,
        'created_at' => IdOrderBy::class,
        'id' => IdOrderBy::class,
        'cost' => CostFilter::class,
    ];
}
