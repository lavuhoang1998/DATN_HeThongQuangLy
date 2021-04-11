<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teachers')->insert([
            'MSGV' => 'GV0001',
            'sex' => 'Nam',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '3',
            'subject_id' => '1',
            'avt' => 'img/avt/teacher/GV0001.jpg',
        ]);
        DB::table('teachers')->insert([
            'MSGV' => 'GV0002',
            'sex' => 'Nam',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '4',
            'subject_id' => '1',
            'avt' => 'img/avt/teacher/GV0002.jpg',
        ]);
    }
}
