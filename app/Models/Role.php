<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\Acl\RoleRepository;
use App\Interfaces\Acl\RolesInterface;

/**
 * Class Role 
 * 
 * @package App\Models;
 */
class Role extends RoleRepository implements RolesInterface
{
    //
}
