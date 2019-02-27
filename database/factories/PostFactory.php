<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(4),
        'description' => $faker->paragraph(5),
        'body' => $faker->paragraph(15),
    ];
});
