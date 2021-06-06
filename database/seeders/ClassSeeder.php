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
            'name' => 'Toán',
            'khoa' => '1',
            'class_name' => '12 Toán',
            'teacher_id' => '2',
            'semester_id' => '1',
        ]);
        DB::table('classes')->insert([
            'name' => 'Lý',
            'khoa' => '1',
            'class_name' => '12 Lý',
            'teacher_id' => '3',
            'semester_id' => '1',
        ]);
        DB::table('classes')->insert([
            'name' => 'Hoá',
            'khoa' => '1',
            'class_name' => '12 Hoá',
            'teacher_id' => '4',
            'semester_id' => '1',
        ]);
        DB::table('classes')->insert([
            'name' => 'Văn',
            'khoa' => '1',
            'class_name' => '12 Văn',
            'teacher_id' => '5',
            'semester_id' => '1',
        ]);
        DB::table('classes')->insert([
            'name' => 'Anh',
            'khoa' => '1',
            'class_name' => '12 Anh',
            'teacher_id' => '6',
            'semester_id' => '1',
        ]);
        DB::table('classes')->insert([
            'name' => 'Tin',
            'khoa' => '1',
            'class_name' => '12 Tin',
            'teacher_id' => '7',
            'semester_id' => '1',
        ]);
        DB::table('classes')->insert([
            'name' => 'K',
            'khoa' => '1',
            'class_name' => '12 K',
            'teacher_id' => '8',
            'semester_id' => '1',
        ]);
        //------------------Khoá 2----------------------------
        DB::table('classes')->insert([
            'name' => 'Toán',
            'khoa' => '2',
            'class_name' => '11 Toán',
            'teacher_id' => '9',
            'semester_id' => '3',
        ]);
        DB::table('classes')->insert([
            'name' => 'Lý',
            'khoa' => '2',
            'class_name' => '11 Lý',
            'teacher_id' => '10',
            'semester_id' => '3',
        ]);
        DB::table('classes')->insert([
            'name' => 'Hoá',
            'khoa' => '2',
            'class_name' => '11 Hoá',
            'teacher_id' => '11',
            'semester_id' => '3',
        ]);
        DB::table('classes')->insert([
            'name' => 'Văn',
            'khoa' => '2',
            'class_name' => '11 Văn',
            'teacher_id' => '12',
            'semester_id' => '3',
        ]);
        DB::table('classes')->insert([
            'name' => 'Anh',
            'khoa' => '2',
            'class_name' => '11 Anh',
            'teacher_id' => '13',
            'semester_id' => '3',
        ]);
        DB::table('classes')->insert([
            'name' => 'Tin',
            'khoa' => '2',
            'class_name' => '11 Tin',
            'teacher_id' => '14',
            'semester_id' => '3',
        ]);
        DB::table('classes')->insert([
            'name' => 'K',
            'khoa' => '2',
            'class_name' => '11 K',
            'teacher_id' => '15',
            'semester_id' => '3',
        ]);
        //------------------Khoá 3----------------------------
        DB::table('classes')->insert([
            'name' => 'Toán',
            'khoa' => '3',
            'class_name' => '10 Toán',
            'teacher_id' => '16',
            'semester_id' => '5',
        ]);
        DB::table('classes')->insert([
            'name' => 'Lý',
            'khoa' => '3',
            'class_name' => '10 Lý',
            'teacher_id' => '7',
            'semester_id' => '5',
        ]);
        DB::table('classes')->insert([
            'name' => 'Hoá',
            'khoa' => '3',
            'class_name' => '10 Hoá',
            'teacher_id' => '18',
            'semester_id' => '5',
        ]);
        DB::table('classes')->insert([
            'name' => 'Văn',
            'khoa' => '3',
            'class_name' => '10 Văn',
            'teacher_id' => '19',
            'semester_id' => '5',
        ]);
        DB::table('classes')->insert([
            'name' => 'Anh',
            'khoa' => '3',
            'class_name' => '10 Anh',
            'teacher_id' => '20',
            'semester_id' => '5',
        ]);
        DB::table('classes')->insert([
            'name' => 'Tin',
            'khoa' => '3',
            'class_name' => '10 Tin',
            'teacher_id' => '21',
            'semester_id' => '5',
        ]);
        DB::table('classes')->insert([
            'name' => 'K',
            'khoa' => '3',
            'class_name' => '10 K',
            'teacher_id' => '22',
            'semester_id' => '5',
        ]);
    }
}
