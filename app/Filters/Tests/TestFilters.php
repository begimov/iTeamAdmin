<?php

namespace App\Filters\Tests;

use App\Filters\FiltersAbstract;
use App\Filters\Tests\Test\SearchFilter;

class TestFilters extends FiltersAbstract
{
    protected $filters = [
        'searchQuery' => SearchFilter::class,
    ];
}
