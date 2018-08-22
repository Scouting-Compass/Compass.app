<?php 

namespace App\Interfaces\Users;

use Illuminate\Database\Eloquent\Builder;
 
/**
 * Interface FilterScopesInterface
 * 
 * @package App\Interfaces\Users
 */
interface FilterScopesInterface 
{
    /**
     * The where clause for the deactivated users. 
     * 
     * @param  Builder $qeury The Eloquent ORM query buider instance.
     * @return Builder
     */
    public function scopeDeactivatedUsers(Builder $query): Builder;

    /**
     * The where clause for the soft deleted users in the application. 
     * 
     * @param  Builder $query The Eloquent ORM query buider instance.
     * @return Builder
     */
    public function scopeDeletedUsers(Builder $query): Builder;

    /**
     * The where clause for the recent created users in the application. 
     * 
     * @param  Builder $query The Eloquent ORM query buider instance.
     * @return Builder
     */
    public function scopeRecentUsers(Builder $query): Builder; 

    /**
     * The where clause for the administrator users in the application. 
     * 
     * @param  Builder $query The Eloquent ORM query buider instance.
     * @return Builder
     */
    public function scopeAdminUsers(Builder $query): Builder;
}