<?php 

namespace App\Interfaces\Acl; 

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
}