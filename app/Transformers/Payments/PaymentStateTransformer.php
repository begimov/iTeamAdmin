<?php

namespace App\Transformers\Payments;

use App\Models\Payments\PaymentState;

class PaymentStateTransformer extends \League\Fractal\TransformerAbstract
{
    public function transform(PaymentState $paymentState)
    {
        return [
            'id' => $paymentState->id,
            'name' => $paymentState->name,
        ];
    }
}
