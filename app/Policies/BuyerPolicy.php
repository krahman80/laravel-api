<?php

namespace App\Policies;

use App\User;
use App\Buyer;
use Illuminate\Auth\Access\HandlesAuthorization;

class BuyerPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Buyer $buyer){
        return $user->id === $buyer->id;
    }
}
