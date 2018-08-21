<?php 

namespace App\Interfaces\Acl;

/**
 * Interface RolesInterface 
 * 
 * @package App\Interfaces\Acl
 */
interface RolesInterface 
{
    /**
     * Conditional to check the g
     */
    public function isRole(string $name): bool
}