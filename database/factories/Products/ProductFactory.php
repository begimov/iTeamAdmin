<?php

use App\Models\Products\Product;

$factory->define(Product::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name(),
        'category_id' => 1,
        'price' => 0
    ];
});

