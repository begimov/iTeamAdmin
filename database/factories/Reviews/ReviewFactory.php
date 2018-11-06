<?php

use App\Models\Reviews\Review;

$factory->define(Review::class, function (Faker\Generator $faker) {
    return [
        'quote' => $faker->sentence(),
    ];
});

