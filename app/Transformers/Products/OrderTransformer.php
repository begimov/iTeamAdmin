<?php

namespace App\Transformers\Products;

use App\Models\Products\Order;
use App\Transformers\UserTransformer;
use App\Transformers\Payments\PaymentTypeTransformer;

class OrderTransformer extends \League\Fractal\TransformerAbstract
{
    protected $availableIncludes = ['user', 'paymentType'];

    public function transform(Order $order)
    {
        return [
            'id' => $order->id,
            'payment_state_id' => $order->payment_state_id,
            'payment_type_id' => $order->payment_type_id,
            'created_at_human' => $order->created_at->diffForHumans(),
        ];
    }

    public function includeUser(Order $order)
    {
        return $this->item($order->user, new UserTransformer);
    }

    public function includePaymentType(Order $order)
    {
        if ($order->paymentType) {
            return $this->item($order->paymentType, new PaymentTypeTransformer);
        }
    }
}
