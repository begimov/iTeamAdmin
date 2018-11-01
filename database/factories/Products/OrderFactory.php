<?php

use App\Models\Products\Order;

$factory->define(Order::class, function (Faker\Generator $faker) {
    return [
        'payment_state_id' => 1,
        'payment_type_id' => 1
    ];
});

