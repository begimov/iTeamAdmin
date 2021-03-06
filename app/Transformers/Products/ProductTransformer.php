<?php

namespace App\Transformers\Products;

use App\Models\Products\Product;

use App\Transformers\Products\CategoryTransformer;
use App\Transformers\Products\PriceTagTransformer;
use App\Transformers\Tests\TestTransformer;

class ProductTransformer extends \League\Fractal\TransformerAbstract
{
    protected $availableIncludes = ['category', 'priceTags', 'materials', 'tests'];

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

    public function includePriceTags(Product $product)
    {
        return $this->collection($product->priceTags, new PriceTagTransformer);
    }

    public function includeMaterials(Product $product)
    {
        return $this->collection($product->materials, new MaterialTransformer);
    }

    public function includeTests(Product $product)
    {
        return $this->collection($product->tests, new TestTransformer);
    }
}
