<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;

class PostPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        
    }

    public function author(User $user, Post $post)
    {
        //TODO: $user is a user authenticated
        if ($user->id == $post->user_id) {
            return true;
        }else{
            return false;
        }
    }
}
