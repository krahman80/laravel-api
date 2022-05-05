<?php

use App\Place;
use App\Booking;
use Illuminate\Database\Seeder;

class BookingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Place::all()->each(function(Place $place) {
            $booking = factory(Booking::class)->make();
            $bookings = collect([$booking]);

            for ($i=0; $i < random_int(1,10); $i++) { 
                $from = (clone $booking->to)->addDays(random_int(1, 14));
                $to = (clone $from)->addDays(random_int(1, 14));

                $booking = Booking::make([
                    'from' => $from,
                    'to' => $to
                ]);
            }

            $bookings->push($booking);

            $place->bookings()->saveMany($bookings);
        });

        
    }
}
