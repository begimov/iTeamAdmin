<?php

namespace App\Transformers\Pages;

use App\Models\Pages\Page;

class PageTransformer extends \League\Fractal\TransformerAbstract
{
    public function transform(Page $page)
    {
        return [
            'id' => $page->id,
            'name' => $page->name,
            'description' => $page->description,
        ];
    }
}
