<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomeRoomTeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //------------------------Ki 20181 + 20182-----------------------
        for ($i = 1; $i <= 2; $i++) {
            DB::table('homeroom_teachers')->insert([
                'class_id' => '1',
                'teacher_id' => '2',
                'semester_id' => $i,
            ]);
            DB::table('homeroom_teachers')->insert([
                'class_id' => '2',
                'teacher_id' => '3',
                'semester_id' => $i,
            ]);
            DB::table('homeroom_teachers')->insert([
                'class_id' => '3',
                'teacher_id' => '4',
                'semester_id' => $i,
            ]);
            DB::table('homeroom_teachers')->insert([
                'class_id' => '4',
                'teacher_id' => '5',
                'semester_id' => $i,
            ]);
            DB::table('homeroom_teachers')->insert([
                'class_id' => '5',
                'teacher_id' => '6',
                'semester_id' => $i,
            ]);
            DB::table('homeroom_teachers')->insert([
                'class_id' => '6',
                'teacher_id' => '7',
                'semester_id' => $i,
            ]);
            DB::table('homeroom_teachers')->insert([
                'class_id' => '7',
                'teacher_id' => '8',
                'semester_id' => $i,
            ]);
        }
        //------------------------Ki 20191 + 20192-----------------------
        for ($i = 3; $i <= 4; $i++) {
            DB::table('homeroom_teachers')->insert([
                'class_id' => '1',
                'teacher_id' => '2',
                'semester_id' => $i,
            ]);
            DB::table('homeroom_teachers')->insert([
                'class_id' => '2',
                'teacher_id' => '3',
                'semester_id' => $i,
            ]);
            DB::table('homeroom_teachers')->insert([
                'class_id' => '3',
                'teacher_id' => '4',
                'semester_id' => $i,
            ]);
            DB::table('homeroom_teachers')->insert([
                'class_id' => '4',
                'teacher_id' => '5',
                'semester_id' => $i,
            ]);
            DB::table('homeroom_teachers')->insert([
                'class_id' => '5',
                'teacher_id' => '6',
                'semester_id' => $i,
            ]);
            DB::table('homeroom_teachers')->insert([
                'class_id' => '6',
                'teacher_id' => '7',
                'semester_id' => $i,
            ]);
            DB::table('homeroom_teachers')->insert([
                'class_id' => '7',
                'teacher_id' => '8',
                'semester_id' => $i,
            ]);
            DB::table('homeroom_teachers')->insert([
                'class_id' => '8',
                'teacher_id' => '2',
                'semester_id' => $i,
            ]);
            DB::table('homeroom_teachers')->insert([
                'class_id' => '9',
                'teacher_id' => '3',
                'semester_id' => $i,
            ]);
            DB::table('homeroom_teachers')->insert([
                'class_id' => '10',
                'teacher_id' => '4',
                'semester_id' => $i,
            ]);
            DB::table('homeroom_teachers')->insert([
                'class_id' => '11',
                'teacher_id' => '5',
                'semester_id' => $i,
            ]);
            DB::table('homeroom_teachers')->insert([
                'class_id' => '12',
                'teacher_id' => '6',
                'semester_id' => $i,
            ]);
            DB::table('homeroom_teachers')->insert([
                'class_id' => '13',
                'teacher_id' => '7',
                'semester_id' => $i,
            ]);
            DB::table('homeroom_teachers')->insert([
                'class_id' => '14',
                'teacher_id' => '8',
                'semester_id' => $i,
            ]);
        }
        //------------------------Ki 20201 + 20202-----------------------
        for ($i = 5; $i <= 6; $i++) {
            DB::table('homeroom_teachers')->insert([
                'class_id' => '1',
                'teacher_id' => '2',
                'semester_id' => $i,
            ]);
            DB::table('homeroom_teachers')->insert([
                'class_id' => '2',
                'teacher_id' => '3',
                'semester_id' => $i,
            ]);
            DB::table('homeroom_teachers')->insert([
                'class_id' => '3',
                'teacher_id' => '4',
                'semester_id' => $i,
            ]);
            DB::table('homeroom_teachers')->insert([
                'class_id' => '4',
                'teacher_id' => '5',
                'semester_id' => $i,
            ]);
            DB::table('homeroom_teachers')->insert([
                'class_id' => '5',
                'teacher_id' => '6',
                'semester_id' => $i,
            ]);
            DB::table('homeroom_teachers')->insert([
                'class_id' => '6',
                'teacher_id' => '7',
                'semester_id' => $i,
            ]);
            DB::table('homeroom_teachers')->insert([
                'class_id' => '7',
                'teacher_id' => '8',
                'semester_id' => $i,
            ]);
            DB::table('homeroom_teachers')->insert([
                'class_id' => '8',
                'teacher_id' => '10',
                'semester_id' => $i,
            ]);
            DB::table('homeroom_teachers')->insert([
                'class_id' => '9',
                'teacher_id' => '11',
                'semester_id' => $i,
            ]);
            DB::table('homeroom_teachers')->insert([
                'class_id' => '10',
                'teacher_id' => '12',
                'semester_id' => $i,
            ]);
            DB::table('homeroom_teachers')->insert([
                'class_id' => '11',
                'teacher_id' => '13',
                'semester_id' => $i,
            ]);
            DB::table('homeroom_teachers')->insert([
                'class_id' => '12',
                'teacher_id' => '14',
                'semester_id' => $i,
            ]);
            DB::table('homeroom_teachers')->insert([
                'class_id' => '13',
                'teacher_id' => '15',
                'semester_id' => $i,
            ]);
            DB::table('homeroom_teachers')->insert([
                'class_id' => '14',
                'teacher_id' => '16',
                'semester_id' => $i,
            ]);
            DB::table('homeroom_teachers')->insert([
                'class_id' => '15',
                'teacher_id' => '17',
                'semester_id' => $i,
            ]);
            DB::table('homeroom_teachers')->insert([
                'class_id' => '16',
                'teacher_id' => '18',
                'semester_id' => $i,
            ]);
            DB::table('homeroom_teachers')->insert([
                'class_id' => '17',
                'teacher_id' => '19',
                'semester_id' => $i,
            ]);
            DB::table('homeroom_teachers')->insert([
                'class_id' => '18',
                'teacher_id' => '20',
                'semester_id' => $i,
            ]);
            DB::table('homeroom_teachers')->insert([
                'class_id' => '19',
                'teacher_id' => '21',
                'semester_id' => $i,
            ]);
            DB::table('homeroom_teachers')->insert([
                'class_id' => '20',
                'teacher_id' => '22',
                'semester_id' => $i,
            ]);
            DB::table('homeroom_teachers')->insert([
                'class_id' => '21',
                'teacher_id' => '23',
                'semester_id' => $i,
            ]);
        }
    }
}
