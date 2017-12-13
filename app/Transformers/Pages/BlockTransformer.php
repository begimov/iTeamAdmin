<?php

namespace App\Transformers\Pages;

use App\Models\Pages\Block;

class BlockTransformer extends \League\Fractal\TransformerAbstract
{
    public function transform(Block $block)
    {
      // TODO: add name column to blocks and figure out way to store data props
        return [
            'id' => $block->id,
            'tag' => 'block-' . $block->view,
            'name' => $block->view,
            'template' => view('pages.page.blocks.' . $block->view)->render(),
            'data' => $block->data
        ];
    }
}
