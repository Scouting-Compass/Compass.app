<?php

namespace Compass\Models;

use Illuminate\Database\Eloquent\Model;
use Compass\Repositories\Acl\RoleRepository;
use Compass\Interfaces\Acl\RolesInterface;

/**
 * Class Role 
 * 
 * @package Compass\Models;
 */
class Role extends RoleRepository implements RolesInterface
{
    //
}
