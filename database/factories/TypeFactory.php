<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Type::class, function (Faker $faker) {
    return [
        'name' => $faker->word, // Replace 'name' with your actual column name
        'description' => $faker->sentence, // Add additional fields if necessary
    ];
});
