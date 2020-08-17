<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\posts;
use Faker\Generator as Faker;

$factory->define(posts::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(1),
        'content' => $faker->sentence

    ];
});
