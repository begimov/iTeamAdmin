<?php

namespace App\Filters\Products\Order;

use App\Filters\FilterAbstract;

use App\Repositories\Eloquent\Criteria\Search;

class SearchFilter extends FilterAbstract
{
    public function filter($repository, $value)
    {
        return $repository->withCriteria([
            new Search($value, 'user', ['email', 'name'])
        ]);
    } 
}
