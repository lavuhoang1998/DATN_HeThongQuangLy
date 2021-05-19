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
        for ($k=1 ; $k <= 11; $k++){
            DB::table('points')->insert([
                'heso1' => '8,8,8',
                'heso2' => '8,8',
                'heso3' => '8',
                'trungbinh' => '8',
                'student_id' => '1',
                'subject_id' => $k,
            ]);
        }


        $a = DB::table('students')->get();
        $count = count($a);

        for ($i=2 ; $i <= $count; $i++){
            for ($j=1 ; $j <= 11; $j++){
                DB::table('points')->insert([
                    'heso1' => ' ',
                    'heso2' => ' ',
                    'heso3' => ' ',
                    'trungbinh' => ' ',
                    'student_id' => $i,
                    'subject_id' => $j,
                ]);
            }
        }



    }
}
