<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeachSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i<=7; $i++) {
            for ($j=2; $j<=7; $j++) {
                for ($k=1; $k<=5; $k++) {
                    DB::table('teaches')->insert([
                        'day' => $j,
                        'shift' => $k,
                        'teacher_id' => '1',
                        'class_id' => $i,
                        'subject_id' => '14',
                        'semester_id' => '1'
                    ]);
                }
            }
        }

        for ($i=1; $i<=7; $i++) {
            for ($j=2; $j<=7; $j++) {
                for ($k=1; $k<=5; $k++) {
                    DB::table('teaches')->insert([
                        'day' => $j,
                        'shift' => $k,
                        'teacher_id' => '1',
                        'class_id' => $i,
                        'subject_id' => '14',
                        'semester_id' => '2'
                    ]);
                }
            }

        }

        for ($i=1; $i<=14; $i++) {
            for ($j=2; $j<=7; $j++) {
                for ($k=1; $k<=5; $k++) {
                    DB::table('teaches')->insert([
                        'day' => $j,
                        'shift' => $k,
                        'teacher_id' => '1',
                        'class_id' => $i,
                        'subject_id' => '14',
                        'semester_id' => '3'
                    ]);
                }
            }

        }

        for ($i=1; $i<=14; $i++) {
            for ($j=2; $j<=7; $j++) {
                for ($k=1; $k<=5; $k++) {
                    DB::table('teaches')->insert([
                        'day' => $j,
                        'shift' => $k,
                        'teacher_id' => '1',
                        'class_id' => $i,
                        'subject_id' => '14',
                        'semester_id' => '4'
                    ]);
                }
            }

        }

        for ($i=1; $i<=21; $i++) {
            for ($j=2; $j<=7; $j++) {
                for ($k=1; $k<=5; $k++) {
                    DB::table('teaches')->insert([
                        'day' => $j,
                        'shift' => $k,
                        'teacher_id' => '1',
                        'class_id' => $i,
                        'subject_id' => '14',
                        'semester_id' => '5'
                    ]);
                }
            }
        }


        //----------------TKB 10 Toán---------------------------
        DB::table('teaches')->insert([
            'day' => '2',
            'shift' => '1',
            'teacher_id' => '1',
            'class_id' => '1',
            'subject_id' => '13',
            'semester_id' => '6'
        ]);
        DB::table('teaches')->insert([
            'day' => '2',
            'shift' => '2',
            'teacher_id' => '26',
            'class_id' => '1',
            'subject_id' => '8',
            'semester_id' => '6'
        ]);
        DB::table('teaches')->insert([
            'day' => '2',
            'shift' => '3',
            'teacher_id' => '26',
            'class_id' => '1',
            'subject_id' => '8',
            'semester_id' => '6'
        ]);
        DB::table('teaches')->insert([
            'day' => '2',
            'shift' => '4',
            'teacher_id' => '29',
            'class_id' => '1',
            'subject_id' => '9',
            'semester_id' => '6'
        ]);
        DB::table('teaches')->insert([
            'day' => '2',
            'shift' => '5',
            'teacher_id' => '1',
            'class_id' => '1',
            'subject_id' => '14',
            'semester_id' => '6'
        ]);
        DB::table('teaches')->insert([
            'day' => '3',
            'shift' => '1',
            'teacher_id' => '2',
            'class_id' => '1',
            'subject_id' => '1',
            'semester_id' => '6'
        ]);
        DB::table('teaches')->insert([
            'day' => '3',
            'shift' => '2',
            'teacher_id' => '2',
            'class_id' => '1',
            'subject_id' => '1',
            'semester_id' => '6'
        ]);
        DB::table('teaches')->insert([
            'day' => '3',
            'shift' => '3',
            'teacher_id' => '16',
            'class_id' => '1',
            'subject_id' => '4',
            'semester_id' => '6'
        ]);
        DB::table('teaches')->insert([
            'day' => '3',
            'shift' => '4',
            'teacher_id' => '12',
            'class_id' => '1',
            'subject_id' => '3',
            'semester_id' => '6'
        ]);
        DB::table('teaches')->insert([
            'day' => '3',
            'shift' => '5',
            'teacher_id' => '12',
            'class_id' => '1',
            'subject_id' => '3',
            'semester_id' => '6'
        ]);

        DB::table('teaches')->insert([
            'day' => '4',
            'shift' => '1',
            'teacher_id' => '2',
            'class_id' => '1',
            'subject_id' => '1',
            'semester_id' => '6'
        ]);
        DB::table('teaches')->insert([
            'day' => '4',
            'shift' => '2',
            'teacher_id' => '19',
            'class_id' => '1',
            'subject_id' => '5',
            'semester_id' => '6'
        ]);
        DB::table('teaches')->insert([
            'day' => '4',
            'shift' => '3',
            'teacher_id' => '12',
            'class_id' => '1',
            'subject_id' => '3',
            'semester_id' => '6'
        ]);
        DB::table('teaches')->insert([
            'day' => '4',
            'shift' => '4',
            'teacher_id' => '12',
            'class_id' => '1',
            'subject_id' => '3',
            'semester_id' => '6'
        ]);
        DB::table('teaches')->insert([
            'day' => '4',
            'shift' => '5',
            'teacher_id' => '35',
            'class_id' => '1',
            'subject_id' => '11',
            'semester_id' => '6'
        ]);

        DB::table('teaches')->insert([
            'day' => '5',
            'shift' => '1',
            'teacher_id' => '12',
            'class_id' => '1',
            'subject_id' => '3',
            'semester_id' => '6'
        ]);
        DB::table('teaches')->insert([
            'day' => '5',
            'shift' => '2',
            'teacher_id' => '35',
            'class_id' => '1',
            'subject_id' => '11',
            'semester_id' => '6'
        ]);
        DB::table('teaches')->insert([
            'day' => '5',
            'shift' => '3',
            'teacher_id' => '32',
            'class_id' => '1',
            'subject_id' => '10',
            'semester_id' => '6'
        ]);
        DB::table('teaches')->insert([
            'day' => '5',
            'shift' => '4',
            'teacher_id' => '8',
            'class_id' => '1',
            'subject_id' => '2',
            'semester_id' => '6'
        ]);
        DB::table('teaches')->insert([
            'day' => '5',
            'shift' => '5',
            'teacher_id' => '8',
            'class_id' => '1',
            'subject_id' => '2',
            'semester_id' => '6'
        ]);
        DB::table('teaches')->insert([
            'day' => '6',
            'shift' => '1',
            'teacher_id' => '8',
            'class_id' => '1',
            'subject_id' => '2',
            'semester_id' => '6'
        ]);
        DB::table('teaches')->insert([
            'day' => '6',
            'shift' => '2',
            'teacher_id' => '8',
            'class_id' => '1',
            'subject_id' => '2',
            'semester_id' => '6'
        ]);
        DB::table('teaches')->insert([
            'day' => '6',
            'shift' => '3',
            'teacher_id' => '23',
            'class_id' => '1',
            'subject_id' => '7',
            'semester_id' => '6'
        ]);
        DB::table('teaches')->insert([
            'day' => '6',
            'shift' => '4',
            'teacher_id' => '32',
            'class_id' => '1',
            'subject_id' => '10',
            'semester_id' => '6'
        ]);
        DB::table('teaches')->insert([
            'day' => '6',
            'shift' => '5',
            'teacher_id' => '1',
            'class_id' => '1',
            'subject_id' => '14',
            'semester_id' => '6'
        ]);
        DB::table('teaches')->insert([
            'day' => '7',
            'shift' => '1',
            'teacher_id' => '21',
            'class_id' => '1',
            'subject_id' => '6',
            'semester_id' => '6'
        ]);
        DB::table('teaches')->insert([
            'day' => '7',
            'shift' => '2',
            'teacher_id' => '23',
            'class_id' => '1',
            'subject_id' => '5',
            'semester_id' => '6'
        ]);
        DB::table('teaches')->insert([
            'day' => '7',
            'shift' => '3',
            'teacher_id' => '2',
            'class_id' => '1',
            'subject_id' => '1',
            'semester_id' => '6'
        ]);
        DB::table('teaches')->insert([
            'day' => '7',
            'shift' => '4',
            'teacher_id' => '2',
            'class_id' => '1',
            'subject_id' => '1',
            'semester_id' => '6'
        ]);
        DB::table('teaches')->insert([
            'day' => '7',
            'shift' => '5',
            'teacher_id' => '1',
            'class_id' => '1',
            'subject_id' => '12',
            'semester_id' => '6'
        ]);

        for ($i=2; $i<=21; $i++) {
            for ($j=2; $j<=7; $j++) {
                for ($k=1; $k<=5; $k++) {
                    DB::table('teaches')->insert([
                        'day' => $j,
                        'shift' => $k,
                        'teacher_id' => '1',
                        'class_id' => $i,
                        'subject_id' => '14',
                        'semester_id' => '6'
                    ]);
                }
            }

        }

    }
}
