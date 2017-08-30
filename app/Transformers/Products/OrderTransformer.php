<?php

namespace App\Transformers\Products;

use App\Models\Products\Order;

class OrderTransformer extends \League\Fractal\TransformerAbstract
{
    public function transform(Order $order)
    {
        return [
            'id' => $order->id,
            'created_at_human' => $order->created_at->diffForHumans(),
        ];
    }
}
