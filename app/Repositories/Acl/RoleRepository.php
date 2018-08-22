<?php 

namespace App\Repositories\Acl;

use Spatie\Permission\Models\Role;
use App\Interfaces\Acl\RolesInterface;
 
/**
 * Class RoleRepository 
 * 
 * @package App\Repositories\Acl
 */
class RoleRepository extends Role implements RolesInterface
{
    /**
     * Conditional for checking if the given role is admin.
     * 
     * @return bool
     */
    public function isAdmin(string $name): bool 
    {
        return $name === 'admin';
    }
}