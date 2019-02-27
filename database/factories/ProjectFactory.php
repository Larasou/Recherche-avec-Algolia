<?php

use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
    return [
        'name' => $faker->words(2, 4),
        'description' => $faker->paragraph(3),
        'body' => $faker->paragraph(10),
    ];
});
