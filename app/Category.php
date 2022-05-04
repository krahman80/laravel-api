<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Category extends Model
{
    protected $fillable = ['name', 'description'];

    public function getIncrementing() {
        return false;
    }

    public function getKeyType() {
        return 'string'; 
    }

    public function products() {
        return $this->belongsToMany(Product::class);
    }

}
