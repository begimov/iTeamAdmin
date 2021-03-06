<?php

namespace App\Filters\Pages\Page;

use App\Filters\FilterAbstract;
use App\Repositories\Eloquent\Criteria\OrderBy;

class CreatedAtOrderBy extends FilterAbstract
{
    public function filter($repository, $value)
    {
        return $repository->withCriteria([
            new OrderBy('created_at', $this->resolveFilterValue($value))
        ]);
    }
}
