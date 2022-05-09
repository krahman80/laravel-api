<?php

namespace App\Http\Controllers\Api;

use App\Place;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Resources\PlacesResource;

class PlaceController extends Controller
{
    public function index() {
        // GET /places?sort=title&filter[title]=homes
        // GET /places?include=bookings
        $places = QueryBuilder::for(Place::class)
                ->allowedIncludes(['bookings'])
                ->allowedSorts('title')
                ->allowedFilters('title')
                ->jsonPaginate();
        return PlacesResource::collection($places);
    }

    public function show($id) {
        // GET /places/1?include=bookings
        $place = QueryBuilder::for(Place::class)
            ->allowedIncludes(['bookings'])
            ->findOrFail($id);
        return new PlacesResource($place);
    }

    public function store(Request $request){
        $place = Place::create([
            'title' => $request->input('title'),
            'description' => $request->input('description')
        ]);
        return new PlacesResource($place);
    }

    public function update(Request $request, Place $place) {        
        $place->update($request->input());
        return new PlacesResource($place);
    } 

    public function destroy(Place $place) {
        $place->delete();
        return new PlacesResource($place);
    }
}
