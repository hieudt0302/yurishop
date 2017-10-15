<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class RolePermissionsTableSeeder extends Seeder
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
            $permissions = Permission::all();
            if(count($permissions)>0){
                $role->permissions()->sync(
                    $permissions->pluck('id')->all()
                );
            }
        }
    }
}
