<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ville;
use Faker\Generator as Faker;

$factory->define(Ville::class, function (Faker $faker) {
    return [
        'name' => $faker->city,
        'address' => $faker->address,
        'mandant_id' => function () {
            return factory(App\Mandant::class)->create()->id; // Associate a Mandant
        },
        'responsable_id' => function () {
            return factory(App\Responsable::class)->create()->id; // Associate a Responsable
        },
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
