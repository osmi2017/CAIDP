<?php

use App\Qualite;
use Faker\Generator as Faker;

$factory->define(Qualite::class, function (Faker $faker) {
    return [
        // Add any attributes for the Qualite model
        // For example:
        'name' => $faker->word, // Assuming the Qualite model has a 'name' attribute
    ];
});
