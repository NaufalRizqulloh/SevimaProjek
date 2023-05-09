<?php

namespace App\Policies;

use App\Models\Insta;
use App\Models\User;

class InstaPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function edit(User $user, Insta $instapp)
    {
        if($instapp->user_id === $user->id){
            return true;
        }

        return false;
    }

    public function delete(User $user, Insta $instapp)
    {
        if($instapp->user_id === $user->id){
            return true;
        }

        return false;
    }
}
