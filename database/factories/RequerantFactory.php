<?php

use App\Requerant;
use App\Qualite;
use App\Type;
use App\User;
use App\Secteur;
use App\Typesecteur;
use Faker\Generator as Faker;

$factory->define(Requerant::class, function (Faker $faker) {
    return [
        'qualite_id' => function () {
            return factory(Qualite::class)->create()->id;  // Generate related Qualite
        },
        'type_id' => function () {
            return factory(Type::class)->create()->id;  // Generate related Type
        },
        'user_id' => function () {
            return factory(User::class)->create()->id;  // Generate related User
        },
        'secteur_id' => function () {
            return factory(Secteur::class)->create()->id;  // Generate related Secteur
        },
        'typesecteurs_id' => function () {
            return factory(Typesecteur::class)->create()->id;  // Generate related Typesecteur
        },
        // Add other attributes if needed:
        // 'attribute_name' => $faker->example,
    ];
});
