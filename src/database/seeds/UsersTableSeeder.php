<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (User::count() == 0) {
            $role = Role::where('name', 'admin')->firstOrFail();
            $user = User::create([
                'username'  => 'admin',
                'first_name' => 'Admin',
                'last_name' => 'Mr.',
                'gender' => true,
                'date_of_birth' => '2017,10,10',
                'email'          => 'admin@admin.com',
                'phone'         => '+84 123 456 789',
                'password'       => bcrypt('admin'),
                'remember_token' => str_random(60),
                'activated' => true
            ]);

            $user->roles()->attach($role);
        }
    }
}
