<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Motorbike; 
use Illuminate\Auth\Access\HandlesAuthorization;

class MotorbikePolicy
{
    use HandlesAuthorization;
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    // a user must be logged in
    public function create(User $user) {
        return $user!==null;
    }

    // anyone can read
    public function read(User $user) {
        return true;
    }

    // the user must be the owner
    public function update(User $user, Motorbike $motorbike) {
        return $user->id === $motorbike->user_id;
    }

    // the user must be the owner
    public function delete(User $user, Motorbike $motorbike) {
        return $user->id === $motorbike->user_id;
    }

}
