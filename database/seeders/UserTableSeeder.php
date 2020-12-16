<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Nguyen Van A',
            'email' => 'nva@sms.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'role_id' => '1',
        ]);

        DB::table('users')->insert([
            'name' => 'Nguyen Van B',
            'email' => 'nvb@sms.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'role_id' => '1',
        ]);

        DB::table('users')->insert([
            'name' => 'Nguyen Van C',
            'email' => 'nvc@sms.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'role_id' => '2',
        ]);

        DB::table('users')->insert([
            'name' => 'Nguyen Van D',
            'email' => 'nvd@sms.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'role_id' => '2',
        ]);

        DB::table('users')->insert([
            'name' => 'Lã Vũ Hoàng',
            'email' => 'lvh@sms.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'role_id' => '3',
        ]);

        DB::table('users')->insert([
            'name' => 'Nguyen Van F',
            'email' => 'nvf@sms.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'role_id' => '3',
        ]);
    }
}
