<?php

namespace App\Filters\Products\Material;

use App\Filters\FilterAbstract;

use App\Repositories\Eloquent\Criteria\Search;

class SearchFilter extends FilterAbstract
{
    public function filter($repository, $value)
    {
        return $repository->withCriteria([
            new Search($value, null, ['name'])
        ]);
    } 
}
