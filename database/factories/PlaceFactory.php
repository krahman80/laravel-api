<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Place;
use Illuminate\Support\Arr;
use Faker\Generator as Faker;

$suffix = [
    'Hotel',
    'Villa',
    'Rooms',
    'Cottages',
    'House',
    'Cheap Rooms',
    'Bungalow',
    'Small House',
];

$factory->define(Place::class, function (Faker $faker) use ($suffix) {
    
    return [
        'title' => $faker->word() ." ". Arr::random($suffix),
        'description' => $faker->text(), 
    ];

});
