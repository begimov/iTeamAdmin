<?php

namespace App\Filters\Pages;

use App\Filters\FiltersAbstract;
use App\Filters\Pages\Page\SearchFilter;

class PageFilters extends FiltersAbstract
{
    protected $filters = [
        'searchQuery' => SearchFilter::class,
    ];
}
