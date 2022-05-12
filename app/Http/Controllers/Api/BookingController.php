<?php

namespace App\Http\Controllers\Api;

use App\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Resources\BookingsResource;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // GET /bookings
        $bookings = QueryBuilder::for(Booking::class)
                  ->jsonPaginate();
        return BookingsResource::collection($bookings);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'from' => 'required|date_format:Y-m-d|after_or_equal:now',
            'to' => 'required|date_format:Y-m-d|after_or_equal:from',
            'place_id' => 'required|integer'
        ]);
        
        $booking = Booking::create($data);
        // $booking = Booking::create($request->all());
        return new BookingsResource($booking);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // GET /bookings/1?include=place
        $booking = QueryBuilder::for(Booking::class)
                 ->allowedIncludes(['place'])
                 ->findOrFail($id);

        return new BookingsResource($booking);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'from' => 'required|date_format:Y-m-d|after_or_equal:now',
            'to' => 'required|date_format:Y-m-d|after_or_equal:from',
            'place_id' => 'required|integer'
        ]);
        
        $booking = Booking::findOrFail($id);
        $booking->from = $data['from'];
        $booking->to = $data['to'];
        $booking->place_id = $data['place_id'];
        $booking->save();

        return new BookingsResource($booking);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $booking = Booking::find($id);
        $booking->delete();
        return new BookingsResource($booking);
    }
}
