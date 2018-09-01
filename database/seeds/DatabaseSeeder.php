<?php

use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void 
    {
        // Ask for DB igration refresh, default is no 
        if ($this->command->confirm('De you wish to refresh migrations before seeding, it will clear all old data?')) {
            $this->command->call('migrate:refresh'); 
            $this->command->warn('Data cleared, starting from blank database.'); 
        }

        // Run other seeders in the system. 
        $this->call(AclTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
    }
}
