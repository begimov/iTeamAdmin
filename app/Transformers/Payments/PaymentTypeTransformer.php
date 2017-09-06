<?php

namespace App\Transformers\Payments;

use App\Models\Payments\PaymentType;

class PaymentTypeTransformer extends \League\Fractal\TransformerAbstract
{
    public function transform(PaymentType $paymentType)
    {
        return [
            'id' => $paymentType->id,
            'name' => $paymentType->name,
        ];
    }
}
