<?php

namespace App\Filters\Pages;

use App\Filters\FiltersAbstract;
use App\Filters\Pages\Page\{
    SearchFilter,
    CategoryFilter,
    ThemeFilter,
    CreatedAtOrderBy,
    IdOrderBy
};

class PageFilters extends FiltersAbstract
{
    protected $filters = [
        'searchQuery' => SearchFilter::class,
        'categories' => CategoryFilter::class,
        'themes' => ThemeFilter::class,
        'created_at' => CreatedAtOrderBy::class,
        'id' => IdOrderBy::class,
    ];
}
