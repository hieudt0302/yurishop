<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::firstOrNew(['name' => 'admin']);
        if (!$role->exists) {
            $role->fill([
                    'display_name' => 'Administrator',
                    'description' => 'Admin Account',
                ])->save();
        }
        $role = Role::firstOrNew(['name' => 'manager']);
        if (!$role->exists) {
            $role->fill([
                    'display_name' => 'Manager',
                    'description' => 'Manager Account',
                ])->save();
        }
        
        $role = Role::firstOrNew(['name' => 'customer']);
        if (!$role->exists) {
            $role->fill([
                    'display_name' => 'Customer',
                    'description' => 'Customer Account',
                ])->save();
        }
    }
}
