<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //------Diem ki 20181--------------------
        for ($i=351 ; $i <= 525; $i++){
            for ($k=1 ; $k <= 11; $k++){
                DB::table('points')->insert([
                    'heso1' => '8,8,8',
                    'heso2' => '8,8',
                    'heso3' => '8',
                    'trungbinh' => '8',
                    'student_id' => $i,
                    'subject_id' => $k,
                    'semester_id' => '1',
                ]);
            }
        }
        //------Diem ki 20182--------------------
        for ($i=351 ; $i <= 525; $i++){
            for ($k=1 ; $k <= 11; $k++){
                DB::table('points')->insert([
                    'heso1' => '7,7,7',
                    'heso2' => '7,7',
                    'heso3' => '7',
                    'trungbinh' => '7',
                    'student_id' => $i,
                    'subject_id' => $k,
                    'semester_id' => '2',
                ]);
            }
        }
        //------Diem ki 20191--------------------
        for ($i=176 ; $i <= 525; $i++){
            for ($k=1 ; $k <= 11; $k++){
                DB::table('points')->insert([
                    'heso1' => '9,9,9',
                    'heso2' => '9,9',
                    'heso3' => '9',
                    'trungbinh' => '9',
                    'student_id' => $i,
                    'subject_id' => $k,
                    'semester_id' => '3',
                ]);
            }
        }
        //------Diem ki 20192--------------------
        for ($i=176 ; $i <= 525; $i++){
            for ($k=1 ; $k <= 11; $k++){
                DB::table('points')->insert([
                    'heso1' => '8,8,8',
                    'heso2' => '8,8',
                    'heso3' => '8',
                    'trungbinh' => '8',
                    'student_id' => $i,
                    'subject_id' => $k,
                    'semester_id' => '4',
                ]);
            }
        }
        //------Diem ki 20201--------------------
        for ($i=1 ; $i <= 525; $i++){
            for ($k=1 ; $k <= 11; $k++){
                DB::table('points')->insert([
                    'heso1' => '9,9,9',
                    'heso2' => '9,9',
                    'heso3' => '9',
                    'trungbinh' => '9',
                    'student_id' => $i,
                    'subject_id' => $k,
                    'semester_id' => '5',
                ]);
            }
        }
        //------Diem ki 20202--------------------
        for ($i=1 ; $i <= 525; $i++){
            for ($k=1 ; $k <= 11; $k++){
                DB::table('points')->insert([
                    'heso1' => '8,8,8',
                    'heso2' => '8,8',
                    'heso3' => '8',
                    'trungbinh' => '8',
                    'student_id' => $i,
                    'subject_id' => $k,
                    'semester_id' => '6',
                ]);
            }
        }
    }
}
