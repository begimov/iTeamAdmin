<?php

namespace App\Transformers\Pages;

use App\Models\Pages\Page;

class PageTransformer extends \League\Fractal\TransformerAbstract
{
    // protected $availableIncludes = ['category', 'priceTags'];

    public function transform(Page $page)
    {
        return [
            'id' => $page->id,
            'name' => $page->name,
        ];
    }

    // public function includeCategory(Product $product)
    // {
    //     return $this->item($product->category, new CategoryTransformer);
    // }

}
