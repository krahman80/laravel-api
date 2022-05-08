<?php

namespace App\Http\Controllers\Api;

use App\Place;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PlacesResource;

class PlaceController extends Controller
{
    public function index() {
        $places = Place::all();
        return PlacesResource::collection($places);
    }

    public function show(Place $place) {
        // $place = Place::find($id);
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
        // return response()->json($place);
        return new PlacesResource($place);
    } 

    public function destroy(Place $place) {
        $place->delete();
        return response()->json($place, 200);
    }
}
