<?php 

namespace Compass\Repositories\Comments;

use Compass\User;
use Compass\Interfaces\CommentInterface;
use Illuminate\Database\Eloquent\Collection;
use BeyondCode\Comments\Comment;

/**
 * Class Repository 
 * ---- 
 * The class that holds all the logic on the comments module off this application.
 * 
 * @package Compass\Repositories\Comments
 */
class Repository implements CommentInterface
{
    /**
     * Get all the unique commentors from a thread except the authenticated user. 
     * 
     * @param  mixed $model The resource collection from the storage.
     * @return Collection 
     */
    public function getUniqueCommentors($model): Collection
    {
        $commenters = Comment::query()
            ->whereCommentableId($model->id)
            ->where('user_id', '!=', auth()->user()->id)
            ->distinct()
            ->get()
            ->pluck('user_id');

        return User::whereIn('id', $commenters)->get();
    }

    /**
     * Send all the notifications to the unique users. 
     * 
     * @param  mixed $model The resource collection from the storage.
     * @return void
     */
    public function sendNotifications($model): void 
    {
        foreach ($this->getUniqueCommentors($model) as $commenter) {
            $when = now()->addMinute();
            $commenter->notify((new CommentSaved())->delay($when));
        }
    }
}