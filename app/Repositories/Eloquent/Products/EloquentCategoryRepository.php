<?php

namespace App\Repositories\Eloquent\Products;

use App\Repositories\EloquentRepositoryAbstract;
use App\Repositories\Contracts\Products\CategoryRepository;

use App\Models\Products\Category;

class EloquentCategoryRepository extends EloquentRepositoryAbstract implements CategoryRepository
{
    public function entity()
    {
        return Category::class;
    }
}
