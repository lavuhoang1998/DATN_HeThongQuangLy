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
            'sex' => 'Nam',
            'date_of_birth' => '1971-07-12',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '1'
        ]);

        DB::table('admins')->insert([
            'MSAdmin' => 'QL0002',
            'sex' => 'Nữ',
            'date_of_birth' => '1974-11-23',
            'que_quan' => 'Thái Bình',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '2'
        ]);
    }
}
