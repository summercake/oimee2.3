<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
class PostPolicy
{

    public function __construct()
    {
    }

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function update(User $user, Post $post)
    {
        return $user->isAuthorOf($post);
    }

    public function destroy(User $user, Post $post)
    {
        return $user->isAuthorOf($post);
    }
}
