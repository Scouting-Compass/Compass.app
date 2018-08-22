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
     * 
     */
    public function scopeActiveUsers(Builder $query): Builder;

    /**
     * 
     */
    public function scopeDeletedUsers(Builder $query): Builder;

    /**
     * 
     */
    public function scopeRecentUsers(Builder $query): Builder; 

    /**
     * 
     */
    public function scopeAdminUsers(Builder $query): Builder;
}