<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //------------------Khoá 1----------------------------
        DB::table('classes')->insert([
            'name' => 'toán',
            'khoa' => '1',
            'class_name' => '12 toán',
            'teacher_id' => '2',
            'semester_id' => '1',
        ]);
        DB::table('classes')->insert([
            'name' => 'lý',
            'khoa' => '1',
            'class_name' => '12 lý',
            'teacher_id' => '3',
            'semester_id' => '1',
        ]);
        DB::table('classes')->insert([
            'name' => 'hoá',
            'khoa' => '1',
            'class_name' => '12 hoá',
            'teacher_id' => '4',
            'semester_id' => '1',
        ]);
        DB::table('classes')->insert([
            'name' => 'văn',
            'khoa' => '1',
            'class_name' => '12 văn',
            'teacher_id' => '5',
            'semester_id' => '1',
        ]);
        DB::table('classes')->insert([
            'name' => 'anh',
            'khoa' => '1',
            'class_name' => '12 anh',
            'teacher_id' => '6',
            'semester_id' => '1',
        ]);
        DB::table('classes')->insert([
            'name' => 'tin',
            'khoa' => '1',
            'class_name' => '12 tin',
            'teacher_id' => '7',
            'semester_id' => '1',
        ]);
        DB::table('classes')->insert([
            'name' => 'k',
            'khoa' => '1',
            'class_name' => '12 k',
            'teacher_id' => '8',
            'semester_id' => '1',
        ]);
        //------------------Khoá 2----------------------------
        DB::table('classes')->insert([
            'name' => 'toán',
            'khoa' => '2',
            'class_name' => '11 toán',
            'teacher_id' => '9',
            'semester_id' => '3',
        ]);
        DB::table('classes')->insert([
            'name' => 'lý',
            'khoa' => '2',
            'class_name' => '11 lý',
            'teacher_id' => '10',
            'semester_id' => '3',
        ]);
        DB::table('classes')->insert([
            'name' => 'hoá',
            'khoa' => '2',
            'class_name' => '11 hoá',
            'teacher_id' => '11',
            'semester_id' => '3',
        ]);
        DB::table('classes')->insert([
            'name' => 'văn',
            'khoa' => '2',
            'class_name' => '11 văn',
            'teacher_id' => '12',
            'semester_id' => '3',
        ]);
        DB::table('classes')->insert([
            'name' => 'anh',
            'khoa' => '2',
            'class_name' => '11 anh',
            'teacher_id' => '13',
            'semester_id' => '3',
        ]);
        DB::table('classes')->insert([
            'name' => 'tin',
            'khoa' => '2',
            'class_name' => '11 tin',
            'teacher_id' => '14',
            'semester_id' => '3',
        ]);
        DB::table('classes')->insert([
            'name' => 'k',
            'khoa' => '2',
            'class_name' => '11 k',
            'teacher_id' => '15',
            'semester_id' => '3',
        ]);
        //------------------Khoá 3----------------------------
        DB::table('classes')->insert([
            'name' => 'toán',
            'khoa' => '3',
            'class_name' => '10 toán',
            'teacher_id' => '16',
            'semester_id' => '5',
        ]);
        DB::table('classes')->insert([
            'name' => 'lý',
            'khoa' => '3',
            'class_name' => '10 lý',
            'teacher_id' => '7',
            'semester_id' => '5',
        ]);
        DB::table('classes')->insert([
            'name' => 'hoá',
            'khoa' => '3',
            'class_name' => '10 hoá',
            'teacher_id' => '18',
            'semester_id' => '5',
        ]);
        DB::table('classes')->insert([
            'name' => 'văn',
            'khoa' => '3',
            'class_name' => '10 văn',
            'teacher_id' => '19',
            'semester_id' => '5',
        ]);
        DB::table('classes')->insert([
            'name' => 'anh',
            'khoa' => '3',
            'class_name' => '10 anh',
            'teacher_id' => '20',
            'semester_id' => '5',
        ]);
        DB::table('classes')->insert([
            'name' => 'tin',
            'khoa' => '3',
            'class_name' => '10 tin',
            'teacher_id' => '21',
            'semester_id' => '5',
        ]);
        DB::table('classes')->insert([
            'name' => 'k',
            'khoa' => '3',
            'class_name' => '10 k',
            'teacher_id' => '22',
            'semester_id' => '5',
        ]);
    }
}
