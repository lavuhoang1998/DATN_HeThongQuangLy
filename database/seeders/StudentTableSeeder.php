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
            'sex' => 'Nữ',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '38',
            'class_id' => '1',
            'avt' => 'img/avt/student/HS0001.jpg',
        ]);
        DB::table('students')->insert([
            'MSHS' => 'HS0002',
            'sex' => 'Nữ',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '39',
            'class_id' => '1',
            'avt' => 'img/avt/student/HS0001.jpg',
        ]);
        DB::table('students')->insert([
            'MSHS' => 'HS0003',
            'sex' => 'Nam',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '40',
            'class_id' => '1',
            'avt' => 'img/avt/student/HS0001.jpg',
        ]);
        DB::table('students')->insert([
            'MSHS' => 'HS0004',
            'sex' => 'Nữ',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '41',
            'class_id' => '1',
            'avt' => 'img/avt/student/HS0001.jpg',
        ]);
        DB::table('students')->insert([
            'MSHS' => 'HS0005',
            'sex' => 'Nam',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '42',
            'class_id' => '1',
            'avt' => 'img/avt/student/HS0001.jpg',
        ]);
        DB::table('students')->insert([
            'MSHS' => 'HS0006',
            'sex' => 'Nam',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '43',
            'class_id' => '1',
            'avt' => 'img/avt/student/HS0001.jpg',
        ]);
        DB::table('students')->insert([
            'MSHS' => 'HS0007',
            'sex' => 'Nam',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '44',
            'class_id' => '1',
            'avt' => 'img/avt/student/HS0001.jpg',
        ]);
        DB::table('students')->insert([
            'MSHS' => 'HS0008',
            'sex' => 'Nữ',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '45',
            'class_id' => '1',
            'avt' => 'img/avt/student/HS0001.jpg',
        ]);
        DB::table('students')->insert([
            'MSHS' => 'HS0009',
            'sex' => 'Nam',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '46',
            'class_id' => '1',
            'avt' => 'img/avt/student/HS0001.jpg',
        ]);
        DB::table('students')->insert([
            'MSHS' => 'HS0010',
            'sex' => 'Nữ',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '47',
            'class_id' => '1',
            'avt' => 'img/avt/student/HS0001.jpg',
        ]);
        DB::table('students')->insert([
            'MSHS' => 'HS0011',
            'sex' => 'Nữ',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '48',
            'class_id' => '1',
            'avt' => 'img/avt/student/HS0001.jpg',
        ]);
        DB::table('students')->insert([
            'MSHS' => 'HS0012',
            'sex' => 'Nữ',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '49',
            'class_id' => '1',
            'avt' => 'img/avt/student/HS0001.jpg',
        ]);
        DB::table('students')->insert([
            'MSHS' => 'HS0013',
            'sex' => 'Nam',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '50',
            'class_id' => '1',
            'avt' => 'img/avt/student/HS0001.jpg',
        ]);
        DB::table('students')->insert([
            'MSHS' => 'HS0014',
            'sex' => 'Nam',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '51',
            'class_id' => '1',
            'avt' => 'img/avt/student/HS0001.jpg',
        ]);
        DB::table('students')->insert([
            'MSHS' => 'HS0015',
            'sex' => 'Nữ',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '52',
            'class_id' => '1',
            'avt' => 'img/avt/student/HS0001.jpg',
        ]);
        DB::table('students')->insert([
            'MSHS' => 'HS0016',
            'sex' => 'Nữ',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '53',
            'class_id' => '1',
            'avt' => 'img/avt/student/HS0001.jpg',
        ]);
        DB::table('students')->insert([
            'MSHS' => 'HS0017',
            'sex' => 'Nam',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '54',
            'class_id' => '1',
            'avt' => 'img/avt/student/HS0001.jpg',
        ]);
        DB::table('students')->insert([
            'MSHS' => 'HS0018',
            'sex' => 'Nam',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '55',
            'class_id' => '1',
            'avt' => 'img/avt/student/HS0001.jpg',
        ]);
        DB::table('students')->insert([
            'MSHS' => 'HS0019',
            'sex' => 'Nữ',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '56',
            'class_id' => '1',
            'avt' => 'img/avt/student/HS0001.jpg',
        ]);
        DB::table('students')->insert([
            'MSHS' => 'HS0020',
            'sex' => 'Nữ',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '57',
            'class_id' => '1',
            'avt' => 'img/avt/student/HS0001.jpg',
        ]);
        DB::table('students')->insert([
            'MSHS' => 'HS0021',
            'sex' => 'Nữ',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '58',
            'class_id' => '1',
            'avt' => 'img/avt/student/HS0001.jpg',
        ]);
        DB::table('students')->insert([
            'MSHS' => 'HS0022',
            'sex' => 'Nam',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '59',
            'class_id' => '1',
            'avt' => 'img/avt/student/HS0001.jpg',
        ]);
        DB::table('students')->insert([
            'MSHS' => 'HS0023',
            'sex' => 'Nữ',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '60',
            'class_id' => '1',
            'avt' => 'img/avt/student/HS0001.jpg',
        ]);
        DB::table('students')->insert([
            'MSHS' => 'HS0024',
            'sex' => 'Nữ',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '61',
            'class_id' => '1',
            'avt' => 'img/avt/student/HS0001.jpg',
        ]);
        DB::table('students')->insert([
            'MSHS' => 'HS0025',
            'sex' => 'Nữ',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '62',
            'class_id' => '1',
            'avt' => 'img/avt/student/HS0001.jpg',
        ]);
        //-------------------10 lý-------------------------------------------------------
        for ($i=1; $i<=3; $i++) {
            for ($j = 1; $j <= 25; $j++) {
                DB::table('students')->insert([
                    'MSHS' => 'HS00'.($j+25*$i),
                    'sex' => 'Nam',
                    'date_of_birth' => '1998-11-06',
                    'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
                    'sdt' => '03299838383',
                    'que_quan' => 'Nam Định',
                    'dan_toc' => 'Kinh',
                    'ton_giao' => 'Không',
                    'user_id' => $j + 37+ 25*$i,
                    'class_id' => $i+1,
                    'avt' => 'img/avt/student/HS0001.jpg',
                ]);
            }
        }

        for ($i=4; $i<=20; $i++) {
            for ($j = 1; $j <= 25; $j++) {
                DB::table('students')->insert([
                    'MSHS' => 'HS0'.($j+25*$i),
                    'sex' => 'Nam',
                    'date_of_birth' => '1998-11-06',
                    'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
                    'sdt' => '03299838383',
                    'que_quan' => 'Nam Định',
                    'dan_toc' => 'Kinh',
                    'ton_giao' => 'Không',
                    'user_id' => $j + 37+ 25*$i,
                    'class_id' => $i+1,
                    'avt' => 'img/avt/student/HS0001.jpg',
                ]);
            }
        }
    }
}
