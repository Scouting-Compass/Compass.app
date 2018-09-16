<?php 

namespace Compass\Interfaces;

use Illuminate\Database\Eloquent\Collection;

/**
 * Interface CommentInterface
 * 
 * @package Compass\Interfaces
 */
interface CommentInterface 
{
    /**
     * Get all the unique commentors from a thread except the authenticated user. 
     * 
     * @param  mixed $model The resource collection from the storage.
     * @return Collection 
     */
    public function getUniqueCommentors($model): Collection;

    /**
     * Send all the notifications to the unique users. 
     * 
     * @param  mixed $model The resource collection from the storage.
     * @return void
     */
    public function sendNotifications($model): void;
}