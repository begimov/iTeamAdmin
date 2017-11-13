<?php

namespace App\Filters;

abstract class FilterAbstract
{
    abstract public function filter($builder, $value, $repository);

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
