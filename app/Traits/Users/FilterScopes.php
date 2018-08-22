<?php 

namespace Compass\Traits\Users; 

use Illuminate\Database\Eloquent\Builder;

/**
 * Trait FilterScopes 
 * 
 * @package Compass\Traits\Users\FilterScopes
 */
trait FilterScopes
{
    /**
     * The where clause for the deactivated users. 
     * 
     * @param  Builder $query The eloquent ORM query builder instance.
     * @return Builder
     */
    public function scopeDeactivatedUsers(Builder $query): Builder
    {
        return $query->onlyBanned();
    }

    /**
     * The where clause for the soft deleted users in the application. 
     * 
     * @param  Builder $query The eloquent ORM query builder instance
     * @return Builder 
     */
    public function scopeDeletedUsers(Builder $query): Builder 
    {
        return $query->onlyTrashed();
    }

    /**
     * The where clause for the recent created users in the application. 
     * 
     * @param  Builder $query The eloquent ORM query builder instance. 
     * @return Builder
     */
    public function scopeRecentUsers(Builder $query): Builder 
    {
        return $query->orderBy('created_at', 'DESC');
    }

    /**
     * The where clause for the administrator users in the application. 
     * 
     * @param  Builder $query The Eloquent ORM query buider instance.
     * @return Builder
     */
    public function scopeAdminUsers(Builder $query): Builder
    {
        return $query->role('admin');
    }
}