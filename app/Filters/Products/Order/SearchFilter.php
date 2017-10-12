<?php

namespace App\Filters\Products\Order;

use App\Filters\FilterAbstract;

use App\Traits\SearchFilterTrait;

class SearchFilter extends FilterAbstract
{
    use SearchFilterTrait;

    public function filter($builder, $value)
    {
        return $this->search($builder, $value,  'user', ['email', 'name']);
    } 
}
