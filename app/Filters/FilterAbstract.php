<?php

namespace App\Filters;

abstract class FilterAbstract
{
    abstract public function filter($repository, $value);

    public function mappings()
    {
        return [];
    }

    protected function resolveFilterValue($key)
    {
        $value = array_get($this->mappings(), $key);
        return $value ?: $key;
    }
}
