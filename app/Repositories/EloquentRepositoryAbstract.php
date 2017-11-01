<?php

namespace App\Repositories;

use App\Repositories\Contracts\RepositoryInterface;

abstract class EloquentRepositoryAbstract implements RepositoryInterface
{
    public function filter($request)
    {
        //return Order::filter($request, $this->getFilters());
    }
}
