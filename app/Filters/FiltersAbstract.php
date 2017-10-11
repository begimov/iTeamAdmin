<?php

namespace App\Filters;

class FiltersAbstract
{
    protected $request;

    protected $filters = [];

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function filter($builder)
    {
        foreach ($this->filters as $filter => $class) {
            $this->resolveFilter($class);
        }
    }

    protected function resolveFilter($class)
    {
        return new $class;
    }
}
