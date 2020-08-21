<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'description' => $faker->paragraph,
        'created_at' => $faker->dateTimeThisYear,
        'price' => $faker->randomFloat(2, 100.00, 9999.00),
        'left_in_stock' => $faker->numberBetween(0, 1000),
        'external_id' => $faker->unique()->numberBetween(1, 10000)
    ];
});
