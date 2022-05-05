<?php

use App\Place;
use App\Review;
use Illuminate\Database\Seeder;

class ReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Place::all()->each(function(Place $places) {
            $reviews = factory(Review::class, random_int(1,3))->make();
            $places->reviews()->saveMany($reviews);
        });

    }
}
