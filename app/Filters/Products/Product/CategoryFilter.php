<?php

namespace App\Filters\Products\Product;

use App\Filters\FilterAbstract;

use App\Repositories\Eloquent\Criteria\OrWhere;

class CategoryFilter extends FilterAbstract
{
    public function filter($repository, $categories)
    {
        foreach ($categories as $categoryId) {
            $repository->withCriteria([
                new OrWhere('category_id', $this->resolveFilterValue($categoryId))
            ]);
        }
        return $repository;
    } 
}
