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

            foreach (explode(',', $inputRoles) as $role) {
                if ($role->isRole('admin')) { // Assign all permissions
                    $role->syncPermissions($permissions->all());
                    $this->command->info('Admin granted all permissions');
                } else { // For others by default only read access
                    $role->syncPermissions($permissions->getUsersPermissions());
                }

                $this->createUser($role); // Create one user for each role 
            }
        } else {
            $role->firstOrCreate(['name' => 'user']); 
            $this->command->info('Added only default user role.'); 
        } 
    }

    /**
     * Create a user with the given role. 
     * 
     * @param  Role $role The resource entity from the role. 
     * @return void 
     */
    private function createUser(Role $role): void 
    {
        $user = factory(User::class)->create(['password' => 'secret'])->assignRole($role->name);

        if ($role->isRole('admin')) {
            $this->command->info('Here are your admin details to login:');
            $this->command->warn($user->email);
            $this->command->warn('Password is "secret"');
        }
    }
}
