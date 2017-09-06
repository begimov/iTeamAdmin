<?php

namespace App\Transformers\Products;

use App\Models\Products\Product;

class ProductTransformer extends \League\Fractal\TransformerAbstract
{
    public function transform(Product $product)
    {
        return [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
        ];
    }
}
