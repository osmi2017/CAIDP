<?php

namespace Database\Factories;

use App\Contentieu;
use App\Saisine;
use App\Doccontentieu;
use App\Message;
use Faker\Generator as Faker;

$factory->define(Contentieu::class, function (Faker $faker) {
    return [
        'saisine_id' => function () {
            return factory(Saisine::class)->create()->id;
        },
    ];
});

$factory->afterCreating(Contentieu::class, function (Contentieu $contentieu, Faker $faker) {
    // Create related doccontentieu records
    factory(Doccontentieu::class, 3)->create([
        'contentieu_id' => $contentieu->id,
    ]);

    // Create related messages
    factory(Message::class, 5)->create([
        'contentieu_id' => $contentieu->id,
    ]);
});
