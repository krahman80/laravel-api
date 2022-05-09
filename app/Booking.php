<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    
    protected $fillable = ['from', 'to', 'place_id'];
    
    public function place() {
        return $this->belongsTo(Place::class);
    }

    public function review() {
        return $this->hasOne(Review::class);
    }
    
}
