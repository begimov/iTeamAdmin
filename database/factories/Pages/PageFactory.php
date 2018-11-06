<?php

use App\Models\Pages\Page;

$factory->define(Page::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name(),
        'description' => $faker->sentence,
        'status' => 1,
        'slug' => $faker->slug
    ];
});

