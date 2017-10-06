<?php

namespace App\Transformers\Pages;

use App\Models\Pages\Block;

class BlockTransformer extends \League\Fractal\TransformerAbstract
{
    // protected $availableIncludes = ['category', 'priceTags'];

    public function transform(Block $block)
    {
      // TODO: add name column to blocks and figure out way to store data props
        return [
            'id' => $block->id,
            'name' => 'block-main',
            'template' => view('pages.page.blocks.' . $block->view)->render(),
            'data' => [
              'name' => '',
            ]
        ];
    }

    // public function includeCategory(Product $product)
    // {
    //     return $this->item($product->category, new CategoryTransformer);
    // }

}
