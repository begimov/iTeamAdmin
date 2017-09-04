<?php

namespace App\Transformers\Products;

use App\Models\Products\Order;
use App\Transformers\UserTransformer;

class OrderTransformer extends \League\Fractal\TransformerAbstract
{
    protected $availableIncludes = ['user'];

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
}
