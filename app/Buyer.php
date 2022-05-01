<?php

namespace App;
use App\transactios;

class Buyer extends User
{
    public function transactions() {
        return $this->hasMany(Transaction::class);
    }
}


