<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;

class CommentPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function delete(User $user, Comment $comments)
    {
        if($comments->user_id === $user->id){
            return true;
        }

        return false;
    }
}
