<?php

namespace App\Transformers\Products;

use App\Models\Products\Material;

class MaterialTransformer extends \League\Fractal\TransformerAbstract
{
    public function transform(Material $material)
    {
        return [
            'id' => $material->id,
            'name' => $material->name,
        ];
    }
}
