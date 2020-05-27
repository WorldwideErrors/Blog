<?php

namespace App\Policies;

use App\Reaction;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReactionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can delete the comment.
     *
     * @param  \App\User  $user
     * @param  \App\Reaction  $reaction
     * @return mixed
     */
    public function delete(User $user, Reaction $reaction)
    {
        return $user->id === $reaction->user_id || $user->id === $reaction->post->author;
    }
}
