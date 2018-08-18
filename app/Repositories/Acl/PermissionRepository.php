<?php 

namespace App\Repositories\Acl;

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
}