<?php

namespace App\Filters;

abstract class FilterAbstract
{
    abstract public function filter($builder, $value);
}
