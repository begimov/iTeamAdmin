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
        foreach ($this->getFilters() as $filter => $class) {
            var_dump($this->resolveFilter($filter));
        }
        return $builder;
    }

    protected function resolveFilter($filter)
    {
        return new $this->filters[$filter];
    }

    protected function getFilters()
    {
        return $this->filterFilters($this->filters);
    }

    protected function filterFilters($filters)
    {
        return array_filter($this->request->only(array_keys($filters)));
    }
}
