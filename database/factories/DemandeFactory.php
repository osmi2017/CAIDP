<?php

use App\Demande;
use App\Requerant;
use App\Organisme;
use App\Mandant;
use Faker\Generator as Faker;

$factory->define(Demande::class, function (Faker $faker) {
    return [
        'dateDemande' => $faker->date(),
        'brouillon' => $faker->boolean,
        'requerant_id' => function () {
            return factory(Requerant::class)->create()->id; // Generate related Requerant
        },
        'organisme_id' => function () {
            return factory(Organisme::class)->create()->id; // Generate related Organisme
        },
        'mandant_id' => function () {
            return factory(Mandant::class)->create()->id; // Generate related Mandant
        },
    ];
});
