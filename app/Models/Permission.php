<?php

namespace App\Models;

use App\Repositories\Acl\PermissionRepository;
use App\Interfaces\Acl\Permissions;

/**
 * Class Permission 
 * 
 * @package App\Models
 */
class Permission extends PermissionRepository implements Permissions
{
    
}
