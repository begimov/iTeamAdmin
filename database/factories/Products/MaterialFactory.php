<?php

use App\Models\Products\Material;

$factory->define(Material::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name(),
    ];
});

