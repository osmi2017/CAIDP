<?php

use App\Decisioncaipdp;
use App\Saisine;
use App\Decisioncaipdpsfile;
use Faker\Generator as Faker;

$factory->define(Decisioncaipdp::class, function (Faker $faker) {
    return [
        'saisine_id' => function () {
            return factory(Saisine::class)->create()->id; // Generates related Saisine
        },
    ];
});

$factory->afterCreating(Decisioncaipdp::class, function ($decisioncaipdp, $faker) {
    factory(Decisioncaipdpsfile::class, 3)->create([
        'decisioncaipdp_id' => $decisioncaipdp->id,
    ]);
});
