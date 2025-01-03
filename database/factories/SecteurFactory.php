<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Secteur;
use Faker\Generator as Faker;

$factory->define(Secteur::class, function (Faker $faker) {
    return [
        'name' => $faker->word, // Replace 'name' with your actual column name
        'description' => $faker->sentence, // Replace 'description' with your actual column name
    ];
});
