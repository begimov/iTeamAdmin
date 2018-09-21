<?php

namespace App\Filters\Reviews\Review;

use App\Filters\FilterAbstract;

use App\Repositories\Eloquent\Criteria\Search;

class SearchFilter extends FilterAbstract
{
    public function filter($repository, $value)
    {
        return $repository->withCriteria([
            new Search($value, null, ['author', 'position', 'quote'])
        ]);
    } 
}
