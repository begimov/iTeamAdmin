<?php

namespace App\Repositories\Eloquent\Products;

use App\Repositories\EloquentRepositoryAbstract;
use App\Repositories\Contracts\Products\ProductRepository;

use App\Models\Products\Product;

class EloquentProductRepository extends EloquentRepositoryAbstract implements ProductRepository
{
    public function entity()
    {
        return Product::class;
    }

    public function destroyById($id)
    {
        // TODO: Do we need to delete products? maybe only delete pages? so no one could see products
    }
}
