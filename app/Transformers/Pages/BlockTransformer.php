<?php

namespace App\Transformers\Pages;

use App\Models\Pages\Block;

class BlockTransformer extends \League\Fractal\TransformerAbstract
{
    public function transform(Block $block)
    {
        return [
            'id' => $block->id,
            'tag' => 'block-' . $block->view,
            'name' => $block->name,
            'template' => view('pages.page.blocks.' . $block->view)->render(),
            'data' => $block->data,
            'description' => $block->description
        ];
    }
}
