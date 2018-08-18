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

}