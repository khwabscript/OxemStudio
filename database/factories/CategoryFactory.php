<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'parent_id' => $faker->randomDigit,
        'external_id' => $faker->unique()->numberBetween(1, 10000)
    ];
});
