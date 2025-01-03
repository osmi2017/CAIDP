<?php

use App\Facilitation;
use App\Saisine;
use Faker\Generator as Faker;

$factory->define(Facilitation::class, function (Faker $faker) {
    return [
        'saisine_id' => function () {
            return factory(Saisine::class)->create()->id; // Generates related Saisine
        },
        'details' => $faker->text, // Replace 'details' with the actual field name in your database
    ];
});
