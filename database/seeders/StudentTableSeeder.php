<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            'MSHS' => 'HS0001',
            'sex' => 'Nam',
            'date_of_birth' => '1998-11-06',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '5'
        ]);

        DB::table('students')->insert([
            'MSHS' => 'HS0002',
            'sex' => 'Nam',
            'date_of_birth' => '1971-07-12',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '6'
        ]);
    }
}
