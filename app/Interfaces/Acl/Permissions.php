<?php 

namespace App\Interfaces\Acl;

use Illuminate\Database\Eloquent\Builder;
 
/**
 * Interface permissions 
 * 
 * @package App\Interfaces\Acl
 */
interface Permissions 
{
    /**
     * Get the default permissions for the application. (Used in AclTableSeeder)
     * 
     * @return array
     */
    public function getDefault(): array;

    /**
     * Method for getting the default permissions from normal users in the application. 
     * 
     * @param  Builder $query The Eloquent ORM query buider instance.
     * @return Builder
     */
    public function ScopeGetUsersPermissions(Builder $query): Builder;
}