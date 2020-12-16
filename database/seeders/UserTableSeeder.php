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
        ]);

        DB::table('users')->insert([
            'name' => 'Nguyen Van B',
            'email' => 'nvb@sms.cyb.edu.com',
            'password' => Hash::make('12345678'),
        ]);

        DB::table('users')->insert([
            'name' => 'Nguyen Van B',
            'email' => 'nvc@sms.cyb.edu.com',
            'password' => Hash::make('1234567'),
        ]);
    }
}
