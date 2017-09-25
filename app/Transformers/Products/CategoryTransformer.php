<?php

namespace App\Transformers\Products;

use App\Models\Products\Category;

class CategoryTransformer extends \League\Fractal\TransformerAbstract
{
    public function transform(Category $category)
    {
        return [
            'id' => $category->id,
            'parent_id' => $category->parent_id,
            'name' => $category->name,
            'slug' => $category->slug,
        ];
    }
}
