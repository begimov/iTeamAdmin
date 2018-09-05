<?php

namespace App\Filters\Tests\Test;

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
