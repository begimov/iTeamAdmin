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

    public function filter($repository)
    {
        foreach ($this->getFilters() as $filter => $value) {
            $this->resolveFilter($filter)->filter($repository, $value);
        }
        return $repository;
    }

    public function add(array $filters)
    {
        $this->filters = array_merge($this->filters, $filters);
        return $this;
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
