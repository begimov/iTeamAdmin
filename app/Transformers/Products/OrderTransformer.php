<?php

namespace App\Transformers\Products;

use App\Models\Products\Order;
use App\Transformers\UserTransformer;
use App\Transformers\Products\ProductTransformer;
use App\Transformers\Payments\{
    PaymentTypeTransformer,
    PaymentStateTransformer
};

class OrderTransformer extends \League\Fractal\TransformerAbstract
{
    protected $availableIncludes = ['user', 'user.profile', 'paymentType', 'product', 'paymentState'];

    public function transform(Order $order)
    {
        return [
            'id' => $order->id,
            'payment_state_id' => $order->payment_state_id,
            'payment_type_id' => $order->payment_type_id,
            'price' => $order->price,
            'created_at_human' => $order->created_at->format('d/m/y, H:i'),
            'updated_at_human' => $order->updated_at->format('d/m/y, H:i'),
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

    public function includeProduct(Order $order)
    {
        return $this->item($order->product, new ProductTransformer);
    }

    public function includePaymentState(Order $order)
    {
        if ($order->paymentState) {
            return $this->item($order->paymentState, new PaymentStateTransformer);
        }
    }
}
