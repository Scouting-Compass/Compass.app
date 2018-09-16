<?php

namespace Compass\Policies;

use Compass\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use BeyondCode\Comments\Comment;

class CommentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can permanently delete the comment.
     *
     * @param  User     $user
     * @param  Comment  $comment
     * @return mixed
     */
    public function destroy(User $user, Comment $comment): bool
    {
        return $user->id === $comment->user_id;
    }
}
