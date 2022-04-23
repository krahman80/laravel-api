<?php

namespace App;
use App\transactios;

class Buyer extends User
{
    public function transactios() {
        return $this->hasMany(Transaction::class);
    }
}


