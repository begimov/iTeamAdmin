<?php

namespace App\Transformers\Products;

use App\Models\Products\PriceTag;

class PriceTagTransformer extends \League\Fractal\TransformerAbstract
{
    public function transform(PriceTag $priceTag)
    {
        return [
            'id' => $priceTag->id,
            'product_id' => $priceTag->product_id,
            'name' => $priceTag->name,
            'price' => $priceTag->price,
        ];
    }
}
