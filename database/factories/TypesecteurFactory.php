<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Typesecteur;
use Faker\Generator as Faker;

$factory->define(Typesecteur::class, function (Faker $faker) {
    return [
        'name' => $faker->word, // Random word for 'name'
        'description' => $faker->sentence, // Random sentence for 'description'
    ];
});
