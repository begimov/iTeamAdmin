<?php

namespace App\Repositories\Eloquent\Products;

use App\Repositories\Contracts\Products\ProductRepository;

use App\Models\Products\Product;

class EloquentProductRepository implements ProductRepository
{
    public function filter($request)
    {
        return Product::filter($request, $this->getFilters());
    }

    public function destroyById($id)
    {
        // TODO: Do we need to delete products? maybe only delete pages? so no one could see products
    }

    protected function getFilters()
    {
        return [];
    }
}
