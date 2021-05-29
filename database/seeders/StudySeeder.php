<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //------Ki 20181 + 20182--------------------
        //-------------Khoi 12---------------------
        for ($i = 351; $i <= 375; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '1',
                'semester_id' => '1',
            ]);
        }
        for ($i = 376; $i <= 400; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '2',
                'semester_id' => '1',
            ]);
        }
        for ($i = 401; $i <= 425; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '3',
                'semester_id' => '1',
            ]);
        }
        for ($i = 426; $i <= 450; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '4',
                'semester_id' => '1',
            ]);
        }
        for ($i = 451; $i <= 475; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '5',
                'semester_id' => '1',
            ]);
        }
        for ($i = 476; $i <= 500; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '6',
                'semester_id' => '1',
            ]);
        }
        for ($i = 501; $i <= 525; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '7',
                'semester_id' => '1',
            ]);
        }
        for ($i = 351; $i <= 375; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '1',
                'semester_id' => '2',
            ]);
        }
        for ($i = 376; $i <= 400; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '2',
                'semester_id' => '2',
            ]);
        }
        for ($i = 401; $i <= 425; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '3',
                'semester_id' => '2',
            ]);
        }
        for ($i = 426; $i <= 450; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '4',
                'semester_id' => '2',
            ]);
        }
        for ($i = 451; $i <= 475; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '5',
                'semester_id' => '2',
            ]);
        }
        for ($i = 476; $i <= 500; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '6',
                'semester_id' => '2',
            ]);
        }
        for ($i = 501; $i <= 525; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '7',
                'semester_id' => '2',
            ]);
        }

        //------Ki 20191 + 20192--------------------
        //-------------Khoi 12---------------------
        for ($i = 351; $i <= 375; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '8',
                'semester_id' => '3',
            ]);
        }
        for ($i = 376; $i <= 400; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '9',
                'semester_id' => '3',
            ]);
        }
        for ($i = 401; $i <= 425; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '10',
                'semester_id' => '3',
            ]);
        }
        for ($i = 426; $i <= 450; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '11',
                'semester_id' => '3',
            ]);
        }
        for ($i = 451; $i <= 475; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '12',
                'semester_id' => '3',
            ]);
        }
        for ($i = 476; $i <= 500; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '13',
                'semester_id' => '3',
            ]);
        }
        for ($i = 501; $i <= 525; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '14',
                'semester_id' => '3',
            ]);
        }
        for ($i = 351; $i <= 375; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '8',
                'semester_id' => '4',
            ]);
        }
        for ($i = 376; $i <= 400; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '9',
                'semester_id' => '4',
            ]);
        }
        for ($i = 401; $i <= 425; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '10',
                'semester_id' => '4',
            ]);
        }
        for ($i = 426; $i <= 450; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '11',
                'semester_id' => '4',
            ]);
        }
        for ($i = 451; $i <= 475; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '12',
                'semester_id' => '4',
            ]);
        }
        for ($i = 476; $i <= 500; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '13',
                'semester_id' => '4',
            ]);
        }
        for ($i = 501; $i <= 525; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '14',
                'semester_id' => '4',
            ]);
        }

        //-------------Khoi 11---------------------
        for ($i = 176; $i <= 200; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '1',
                'semester_id' => '3',
            ]);
        }
        for ($i = 201; $i <= 225; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '2',
                'semester_id' => '3',
            ]);
        }
        for ($i = 226; $i <= 250; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '3',
                'semester_id' => '3',
            ]);
        }
        for ($i = 251; $i <= 275; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '4',
                'semester_id' => '3',
            ]);
        }
        for ($i = 276; $i <= 300; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '5',
                'semester_id' => '3',
            ]);
        }
        for ($i = 301; $i <= 325; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '6',
                'semester_id' => '3',
            ]);
        }
        for ($i = 326; $i <= 350; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '7',
                'semester_id' => '3',
            ]);
        }
        for ($i = 176; $i <= 200; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '1',
                'semester_id' => '4',
            ]);
        }
        for ($i = 201; $i <= 225; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '2',
                'semester_id' => '4',
            ]);
        }
        for ($i = 226; $i <= 250; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '3',
                'semester_id' => '4',
            ]);
        }
        for ($i = 251; $i <= 275; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '4',
                'semester_id' => '4',
            ]);
        }
        for ($i = 276; $i <= 300; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '5',
                'semester_id' => '4',
            ]);
        }
        for ($i = 301; $i <= 325; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '6',
                'semester_id' => '4',
            ]);
        }
        for ($i = 326; $i <= 350; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '7',
                'semester_id' => '4',
            ]);
        }

        //------Ki 20201 + 20202--------------------
        //-------------Khoi 12---------------------
        for ($i = 351; $i <= 375; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '15',
                'semester_id' => '5',
            ]);
        }
        for ($i = 376; $i <= 400; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '16',
                'semester_id' => '5',
            ]);
        }
        for ($i = 401; $i <= 425; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '17',
                'semester_id' => '5',
            ]);
        }
        for ($i = 426; $i <= 450; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '18',
                'semester_id' => '5',
            ]);
        }
        for ($i = 451; $i <= 475; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '19',
                'semester_id' => '5',
            ]);
        }
        for ($i = 476; $i <= 500; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '20',
                'semester_id' => '5',
            ]);
        }
        for ($i = 501; $i <= 525; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '21',
                'semester_id' => '5',
            ]);
        }
        for ($i = 351; $i <= 375; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '15',
                'semester_id' => '6',
            ]);
        }
        for ($i = 376; $i <= 400; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '16',
                'semester_id' => '6',
            ]);
        }
        for ($i = 401; $i <= 425; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '17',
                'semester_id' => '6',
            ]);
        }
        for ($i = 426; $i <= 450; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '18',
                'semester_id' => '6',
            ]);
        }
        for ($i = 451; $i <= 475; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '19',
                'semester_id' => '6',
            ]);
        }
        for ($i = 476; $i <= 500; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '20',
                'semester_id' => '6',
            ]);
        }
        for ($i = 501; $i <= 525; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '21',
                'semester_id' => '6',
            ]);
        }

        //-------------Khoi 11---------------------
        for ($i = 176; $i <= 200; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '8',
                'semester_id' => '5',
            ]);
        }
        for ($i = 201; $i <= 225; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '9',
                'semester_id' => '5',
            ]);
        }
        for ($i = 226; $i <= 250; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '10',
                'semester_id' => '5',
            ]);
        }
        for ($i = 251; $i <= 275; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '11',
                'semester_id' => '5',
            ]);
        }
        for ($i = 276; $i <= 300; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '12',
                'semester_id' => '5',
            ]);
        }
        for ($i = 301; $i <= 325; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '13',
                'semester_id' => '5',
            ]);
        }
        for ($i = 326; $i <= 350; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '14',
                'semester_id' => '5',
            ]);
        }
        for ($i = 176; $i <= 200; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '8',
                'semester_id' => '6',
            ]);
        }
        for ($i = 201; $i <= 225; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '9',
                'semester_id' => '6',
            ]);
        }
        for ($i = 226; $i <= 250; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '10',
                'semester_id' => '6',
            ]);
        }
        for ($i = 251; $i <= 275; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '11',
                'semester_id' => '6',
            ]);
        }
        for ($i = 276; $i <= 300; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '12',
                'semester_id' => '6',
            ]);
        }
        for ($i = 301; $i <= 325; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '13',
                'semester_id' => '6',
            ]);
        }
        for ($i = 326; $i <= 350; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '14',
                'semester_id' => '6',
            ]);
        }

        //-------------Khoi 10---------------------
        for ($i = 1; $i <= 25; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '1',
                'semester_id' => '5',
            ]);
        }
        for ($i = 26; $i <= 50; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '2',
                'semester_id' => '5',
            ]);
        }
        for ($i = 51; $i <= 75; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '3',
                'semester_id' => '5',
            ]);
        }
        for ($i = 76; $i <= 100; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '4',
                'semester_id' => '5',
            ]);
        }
        for ($i = 101; $i <= 125; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '5',
                'semester_id' => '5',
            ]);
        }
        for ($i = 126; $i <= 150; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '6',
                'semester_id' => '5',
            ]);
        }
        for ($i = 151; $i <= 175; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '7',
                'semester_id' => '5',
            ]);
        }
        for ($i = 1; $i <= 25; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '1',
                'semester_id' => '6',
            ]);
        }
        for ($i = 26; $i <= 50; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '2',
                'semester_id' => '6',
            ]);
        }
        for ($i = 51; $i <= 75; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '3',
                'semester_id' => '6',
            ]);
        }
        for ($i = 76; $i <= 100; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '4',
                'semester_id' => '6',
            ]);
        }
        for ($i = 101; $i <= 125; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '5',
                'semester_id' => '6',
            ]);
        }
        for ($i = 126; $i <= 150; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '6',
                'semester_id' => '6',
            ]);
        }
        for ($i = 151; $i <= 175; $i++) {
            DB::table('studies')->insert([
                'student_id' => $i,
                'class_id' => '7',
                'semester_id' => '6',
            ]);
        }
    }
}
