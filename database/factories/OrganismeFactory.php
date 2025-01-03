<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Organisme;
use Faker\Generator as Faker;

$factory->define(Organisme::class, function (Faker $faker) {
    return [
        'name' => $faker->company, // Example: Organisme name
        'email' => $faker->unique()->safeEmail, // Example: Organisme email
        'address' => $faker->address, // Example: Organisme address
        'phone' => $faker->phoneNumber, // Example: Organisme phone
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
