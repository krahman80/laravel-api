<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Review;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'id' => Str::uuid(),
        'content' => $faker->sentences(3, true),
        'rating' => random_int(1, 5),
        
    ];
});
