<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */

// 1 me and test with admin role + some
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

// 2
$factory->define(App\Models\Products\Product::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence,
        'price' => $faker->numberBetween($min = 400, $max = 4000),
        'category_id' => $faker->numberBetween($min = 1, $max = 2),
    ];
});

// 3 for each user ->create(['user_id' => ?])
$factory->define(App\Models\Users\UserProfile::class, function (Faker\Generator $faker) {
    return [
        'phone' => $faker->e164PhoneNumber,
    ];
});

// 4
$factory->define(App\Models\Products\Order::class, function (Faker\Generator $faker) {
    return [
        'user_id' => function () {
            return App\User::inRandomOrder()->first()->id;
        },
        // not paid => no payment_type_id ???
        'payment_type_id' => $faker->numberBetween($min = 1, $max = 4),
        'payment_state_id' => $faker->numberBetween($min = 1, $max = 3),
        'product_id' => function () {
            return App\Models\Products\Product::inRandomOrder()->first()->id;
        }
    ];
});

$factory->define(App\Models\Users\Company::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence,
        'business_entity_id' => function () {
            return App\Models\Users\BusinessEntity::inRandomOrder()->first()->id;
        }
    ];
});

$factory->define(App\Models\Products\Material::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence,
        // 'url' => $faker->url,
        // 'filename' => $faker->fileExtension,
    ];
});
