<?php

namespace App\Policies;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CartPolicy
{
    public function accessAny(User $user, Cart $cart): Response
    {
        return $user->id == $cart->user_id
        ? Response::allow()
        : Response::deny("have no access to this data");
    }
}
