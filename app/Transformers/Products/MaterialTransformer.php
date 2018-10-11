<?php

namespace App\Transformers\Products;

use App\Models\Products\Material;
use App\Transformers\Content\{
    FileTransformer,
    ResourceTransformer
};

class MaterialTransformer extends \League\Fractal\TransformerAbstract
{
    protected $availableIncludes = ['files', 'resources', 'products'];

    public function transform(Material $material)
    {
        return [
            'id' => $material->id,
            'name' => $material->name,
            'accessUrl' => env('BASE_APP_URL') . '/materials/' . $material->id . '/' . $material->token
        ];
    }

    public function includeFiles(Material $material)
    {
        return $this->collection($material->files, new FileTransformer);
    }

    public function includeResources(Material $material)
    {
        return $this->collection($material->resources, new ResourceTransformer);
    }

    public function includeProducts(Material $material)
    {
        return $this->collection($material->products, new ProductTransformer);
    }
}
