<?php

namespace App\Filters;

class FiltersAbstract
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
