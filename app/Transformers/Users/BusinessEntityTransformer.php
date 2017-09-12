<?php

namespace App\Transformers\Users;

use App\Models\Users\BusinessEntity;

class BusinessEntityTransformer extends \League\Fractal\TransformerAbstract
{
    public function transform(BusinessEntity $businessEntity)
    {
        return [
            'id' => $businessEntity->id,
            'name' => $businessEntity->name,
        ];
    }
}
