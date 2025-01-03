<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Mandant;
use Faker\Generator as Faker;

$factory->define(Mandant::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'email' => $faker->unique()->safeEmail,
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'ville_id' => function () {
            return factory(App\Ville::class)->create()->id; // Assuming Ville is another model
        },
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
