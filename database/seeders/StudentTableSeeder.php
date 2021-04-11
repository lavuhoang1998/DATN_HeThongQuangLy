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
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '5',
            'class_id' => '1',
            'avt' => 'img/avt/student/HS0001.jpg',
        ]);

        DB::table('students')->insert([
            'MSHS' => 'HS0002',
            'sex' => 'Nam',
            'date_of_birth' => '1971-07-12',
            'dia_chi' => '169 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '0329873436',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'avt' => 'img/avt/student/HS0002.jpg',
            'class_id' => '1',
            'user_id' => '6'
        ]);
    }
}
