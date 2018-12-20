<?php

use Faker\Generator as Faker;

$factory->define(App\Song::class, function (Faker $faker) {
    return [
        'songname' => $faker->text(8),
        'artist' => $faker->text(8),
        'album' => $faker->text(8),
        'review' => $faker->text(200)
    ];
});
