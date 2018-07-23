<?php

namespace App\Transformers\Content;

use App\Models\Content\Resource;

class ResourceTransformer extends \League\Fractal\TransformerAbstract
{
    public function transform(Resource $resource)
    {
        return [
            'id' => $resource->id,
            'identifier' => $resource->identifier,
        ];
    }
}
