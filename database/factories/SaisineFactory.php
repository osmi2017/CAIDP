<?php

use App\Saisine;
use App\Demande;
use App\Docsaisine;
use App\Facilitation;
use App\Contentieu;
use App\Decisioncaipdp;
use Faker\Generator as Faker;

$factory->define(Saisine::class, function (Faker $faker) {
    return [
        'demande_id' => function () {
            return factory(Demande::class)->create()->id;  // Generate related Demande
        },
        'docsaisine_id' => function () {
            return factory(Docsaisine::class, 2)->create()->pluck('id')->toArray();  // Generate 2 related Docsaisine instances
        },
        'facilitation_id' => function () {
            return factory(Facilitation::class, 2)->create()->pluck('id')->toArray();  // Generate 2 related Facilitation instances
        },
        'contentieu_id' => function () {
            return factory(Contentieu::class, 2)->create()->pluck('id')->toArray();  // Generate 2 related Contentieu instances
        },
        'decisioncaipdp_id' => function () {
            return factory(Decisioncaipdp::class)->create()->id;  // Generate related Decisioncaipdp
        },
    ];
});
