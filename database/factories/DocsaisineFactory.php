<?php

use App\Docsaisine;
use App\Saisine;
use Faker\Generator as Faker;

$factory->define(Docsaisine::class, function (Faker $faker) {
    return [
        'saisine_id' => function () {
            return factory(Saisine::class)->create()->id; // Generate related Saisine
        },
        'file_path' => $faker->filePath(),  // Adjust according to your actual field name
        'description' => $faker->sentence(),  // Adjust according to your actual field name
    ];
});
