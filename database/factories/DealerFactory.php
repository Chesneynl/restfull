<?php

use Faker\Generator as Faker;

$factory->define(App\Dealer::class, function (Faker $faker) {
    return [
        'title' => $faker->text(50),
        'lat' => $faker->text(50),
        'lng' => $faker->text(50),
        'body'  => $faker->text(200),
    ];
});
