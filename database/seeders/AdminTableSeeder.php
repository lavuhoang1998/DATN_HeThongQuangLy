<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'MSAdmin' => 'QL0001',
            'user_id' => '1'
        ]);

        DB::table('admins')->insert([
            'MSAdmin' => 'QL0002',
            'user_id' => '2'
        ]);
    }
}
