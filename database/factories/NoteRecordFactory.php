<?php

use Faker\Generator as Faker;

$factory->define(App\NoteRecord::class, function (Faker $faker) {
    return [
        'title'=> str_random(5),
        'body' => $faker->sentence(5),
        'reason' => $faker->text(),
    ];
});
