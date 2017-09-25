<?php

namespace App\Transformers\Products;

use App\Models\Products\Product;

use App\Transformers\Products\CategoryTransformer;

class ProductTransformer extends \League\Fractal\TransformerAbstract
{
    protected $availableIncludes = ['category'];

    public function transform(Product $product)
    {
        return [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
        ];
    }

    public function includeCategory(Product $product)
    {
        return $this->item($product->category, new CategoryTransformer);
    }
}
