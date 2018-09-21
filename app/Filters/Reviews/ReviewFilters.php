<?php

namespace App\Filters\Reviews;

use App\Filters\FiltersAbstract;
use App\Filters\Reviews\Review\SearchFilter;

class ReviewFilters extends FiltersAbstract
{
    protected $filters = [
        'searchQuery' => SearchFilter::class,
    ];
}
