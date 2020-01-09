<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => implode(' ', $faker->paragraphs),
        'activated' => rand(0, 1),
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'deleted_at' => null
    ];
});
