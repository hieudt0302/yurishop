<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\BookAddress;

class BookAddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::firstOrNew(['username' => 'admin']);
        if ($user->exists) {
            $bookaddress = BookAddress::create([
                'company'  => 'DakMark',
                'first_name' => 'Min',
                'last_name' => 'Anh',
                'address1' => '02 Quang Trung',
                'district' => 'Hải Châu',
                'city' => 'Đà Nẵng',
                'country' => 'Việt Nam',
                'zipcode' => '123456',
                'email'          => 'admin@admin.com',
                'phone'         => '+84 123 456 789',
                'user_id' => $user->id
            ]);
        }
    }
}
