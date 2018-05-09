<?php

namespace App\Transformers\Pages;

use App\Models\Pages\Page;

use App\Transformers\Products\CategoryTransformer;

class PageTransformer extends \League\Fractal\TransformerAbstract
{
    protected $availableIncludes = ['category', 'elements'];

    public function transform(Page $page)
    {
        return [
            'id' => $page->id,
            'name' => $page->name,
            'description' => $page->description,
            'status' => $page->status,
        ];
    }

    public function includeCategory(Page $page)
    {
        return $this->item($page->category, new CategoryTransformer);
    }

    public function includeElements(Page $page)
    {
        return $this->collection($page->elements, new ElementTransformer);
    }
}
