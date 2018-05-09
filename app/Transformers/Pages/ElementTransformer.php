<?php

namespace App\Transformers\Pages;

use App\Models\Pages\Element;

class ElementTransformer extends \League\Fractal\TransformerAbstract
{
    public function transform(Element $element)
    {
        return [
            'id' => $element->id,
            'page_id' => $element->page_id,
            'block_id' => $element->block_id,
            'data' => $element->data,
        ];
    }
}
