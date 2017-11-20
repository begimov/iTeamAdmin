<?php

namespace App\Repositories\Eloquent\Products;

use App\Repositories\EloquentRepositoryAbstract;
use App\Repositories\Contracts\Products\ProductRepository;

use App\Models\Products\Product;
use App\Models\Products\Category;
use App\Models\Products\PriceTag;

class EloquentProductRepository extends EloquentRepositoryAbstract implements ProductRepository
{
    public function entity()
    {
        return Product::class;
    }

    public function store($data)
    {
        $product = new Product;
        $category = Category::find($data['category']['id']);
        

        $product->name = $data['name'];
        $product->price = $data['basePrice'];
        $product->category()->associate($category);

        $product->save();

        if (isset($data['priceTags'])) {
            foreach ($data['priceTags'] as $priceTag) {
                $pt = new PriceTag;
                $pt->name = $priceTag['name'];
                $pt->price = $priceTag['price'];
                $pt->product()->associate($product);
                $pt->save();
            }
        } 
    }

    public function destroyById($id)
    {
        // TODO: Do we need to delete products? maybe only delete pages? so no one could see products
    }
}
