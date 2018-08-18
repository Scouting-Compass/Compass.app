<?php

use Illuminate\Database\Seeder;
use App\Models\{Role, Permission};

/**
 * class AclTableSeeder
 */
class AclTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @param  Permission   $permission The ACL permissions database model. 
     * @param  Role         $role       The ACL roles database model. 
     * @return void
     */
    public function run(Permission $permissions, Role $roles): void
    {
        // Seed default permissions 
        foreach ($permissions->getDefault() as $permission) {
            $permission->firstOrCreate(['name' => trim($permission)]);
        } 

        $this->command->info('Default permissions added.');

        if ($this->command->confirm('Create roles for users(s), default is admin and user?', true)) {  //? Confirm roles needed
            $inputRoles = $this->command->ask('Enter roles in comma separated format.', 'admin,user'); //? Ask Roles from input

            if ($role->is()) { // Assign all permissions

            }
        } 
    }
}
