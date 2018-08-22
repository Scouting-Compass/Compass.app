<?php 

namespace App\Repositories\Acl;

use Illuminate\Database\Eloquent\Builder;
use Spatie\Permission\Models\Permission;
use App\Interfaces\Acl\Permissions;

/**
 * Class PermissionRepository 
 * 
 * @package App\Repositories\Acl
 */
class PermissionRepository extends Permission implements Permissions
{
    /**
     * Get the default permissions for the application. (Used in AclTableSeeder)
     * 
     * @return array 
     */
    public function getDefault(): array 
    {
        return [];
    }

    /**
     * Scope a query to only include popular users.
     *
     * @param  Builder $query The Eloquent ORM query buider instance. 
     * @return Builder
     */
    public function ScopeGetUsersPermissions(Builder $query): Builder
    {
        return $query->where('name', 'LIKE','view_%');
    }
}