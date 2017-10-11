<?php

namespace App\Filters\Products;

class OrderFilters
{
    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function filter($builder)
    {
        return $builder;
    }
}
