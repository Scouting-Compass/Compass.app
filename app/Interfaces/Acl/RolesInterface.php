<?php 

namespace Compass\Interfaces\Acl;

/**
 * Interface RolesInterface 
 * 
 * @package Compass\Interfaces\Acl
 */
interface RolesInterface 
{
    /**
     * Conditional to check if the given role name is the same in the resource entity. 
     * 
     * @return bool
     */
    public function isAdmin(string $name): bool;
}