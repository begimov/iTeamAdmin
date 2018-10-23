<?php

namespace App\Filters\Products\Product;

use App\Filters\FilterAbstract;

use App\Repositories\Eloquent\Criteria\{
    Where,
    WhereGreater
};

class CostFilter extends FilterAbstract
{
    public function mappings()
    {
        return [
            2 => 'paidProducts',
            3 => 'freeProducts'
        ];
    }

    public function filter($repository, $id)
    {
        if (!method_exists($this, $method = $this->resolveFilterValue($id))) 
            return $repository;

        return $this->{$method}($repository);
    } 

    public function paidProducts($repository)
    {
        $repository->withCriteria([
            new WhereGreater('price', 0)
        ]);

        return $repository;
    }

    public function freeProducts($repository)
    {
        $repository->withCriteria([
            new Where('price', 0)
        ]);

        return $repository;
    }
}
