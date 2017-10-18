<?php

use Faker\Generator as Faker;


$factory->define(App\Notebook::class, function (Faker $faker) {
    return [
        'name' => str_random(10),
        'hidden' => '0',
    ];
});
