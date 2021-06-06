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
            'user_id' => '38',
            'class_id' => '1',
        ]);
        DB::table('students')->insert([
            'MSHS' => 'HS0002',
            'user_id' => '39',
            'class_id' => '1',
        ]);
        DB::table('students')->insert([
            'MSHS' => 'HS0003',
            'user_id' => '40',
            'class_id' => '1',
        ]);
        DB::table('students')->insert([
            'MSHS' => 'HS0004',
            'user_id' => '41',
            'class_id' => '1',
        ]);
        DB::table('students')->insert([
            'MSHS' => 'HS0005',
            'user_id' => '42',
            'class_id' => '1',
        ]);
        DB::table('students')->insert([
            'MSHS' => 'HS0006',
            'user_id' => '43',
            'class_id' => '1',
        ]);
        DB::table('students')->insert([
            'MSHS' => 'HS0007',
            'user_id' => '44',
            'class_id' => '1',
        ]);
        DB::table('students')->insert([
            'MSHS' => 'HS0008',
            'user_id' => '45',
            'class_id' => '1',
        ]);
        DB::table('students')->insert([
            'MSHS' => 'HS0009',
            'user_id' => '46',
            'class_id' => '1',
        ]);
        DB::table('students')->insert([
            'MSHS' => 'HS0010',
            'user_id' => '47',
            'class_id' => '1',
        ]);
        DB::table('students')->insert([
            'MSHS' => 'HS0011',
            'user_id' => '48',
            'class_id' => '1',
        ]);
        DB::table('students')->insert([
            'MSHS' => 'HS0012',
            'user_id' => '49',
            'class_id' => '1',
        ]);
        DB::table('students')->insert([
            'MSHS' => 'HS0013',
            'user_id' => '50',
            'class_id' => '1',
        ]);
        DB::table('students')->insert([
            'MSHS' => 'HS0014',
            'user_id' => '51',
            'class_id' => '1',
        ]);
        DB::table('students')->insert([
            'MSHS' => 'HS0015',
            'user_id' => '52',
            'class_id' => '1',
        ]);
        DB::table('students')->insert([
            'MSHS' => 'HS0016',
            'user_id' => '53',
            'class_id' => '1',
        ]);
        DB::table('students')->insert([
            'MSHS' => 'HS0017',
            'user_id' => '54',
            'class_id' => '1',
        ]);
        DB::table('students')->insert([
            'MSHS' => 'HS0018',
            'user_id' => '55',
            'class_id' => '1',
        ]);
        DB::table('students')->insert([
            'MSHS' => 'HS0019',
            'user_id' => '56',
            'class_id' => '1',
        ]);
        DB::table('students')->insert([
            'MSHS' => 'HS0020',
            'user_id' => '57',
            'class_id' => '1',
        ]);
        DB::table('students')->insert([
            'MSHS' => 'HS0021',
            'user_id' => '58',
            'class_id' => '1',
        ]);
        DB::table('students')->insert([
            'MSHS' => 'HS0022',
            'user_id' => '59',
            'class_id' => '1',
        ]);
        DB::table('students')->insert([
            'MSHS' => 'HS0023',
            'user_id' => '60',
            'class_id' => '1',
        ]);
        DB::table('students')->insert([
            'MSHS' => 'HS0024',
            'user_id' => '61',
            'class_id' => '1',
        ]);
        DB::table('students')->insert([
            'MSHS' => 'HS0025',
            'user_id' => '62',
            'class_id' => '1',
        ]);
        //-------------------12 lý ,12 Hoa, 12Van-------------------------------------------------------
        for ($i=1; $i<=3; $i++) {
            for ($j = 1; $j <= 25; $j++) {
                DB::table('students')->insert([
                    'MSHS' => 'HS00'.($j+25*$i),
                    'user_id' => $j + 37+ 25*$i,
                    'class_id' => $i +1,
                ]);
            }
        }

        //-------------------11 Anh ,11 Tin, 11 K-------------------------------------------------------
        for ($i=4; $i<=6; $i++) {
            for ($j = 1; $j <= 25; $j++) {
                DB::table('students')->insert([
                    'MSHS' => 'HS0'.($j+25*$i),
                    'user_id' => $j + 37+ 25*$i,
                    'class_id' => $i +1,
                ]);
            }
        }

        //-------------------Khoi 11-------------------------------------------------------
        for ($i=7; $i<=13; $i++) {
            for ($j = 1; $j <= 25; $j++) {
                DB::table('students')->insert([
                    'MSHS' => 'HS0'.($j+25*$i),
                    'user_id' => $j + 37+ 25*$i,
                    'class_id' => $i +1,
                ]);
            }
        }
        //-------------------Khoi 10-------------------------------------------------------
        for ($i=14; $i<=20; $i++) {
            for ($j = 1; $j <= 25; $j++) {
                DB::table('students')->insert([
                    'MSHS' => 'HS0'.($j+25*$i),
                    'user_id' => $j + 37+ 25*$i,
                    'class_id' => $i +1,
                ]);
            }
        }
    }
}
