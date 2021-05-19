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
        DB::table('classes')->insert([
            'class_name' => '10 Toán',
            'teacher_id' => '2',
        ]);
        DB::table('classes')->insert([
            'class_name' => '10 Lý',
            'teacher_id' => '23',
        ]);
        DB::table('classes')->insert([
            'class_name' => '10 Hoá',
            'teacher_id' => '26',
        ]);
        DB::table('classes')->insert([
            'class_name' => '10 Văn',
            'teacher_id' => '7',
        ]);
        DB::table('classes')->insert([
            'class_name' => '10 Anh',
            'teacher_id' => '12',
        ]);
        DB::table('classes')->insert([
            'class_name' => '10 Tin',
            'teacher_id' => '34',
        ]);
        DB::table('classes')->insert([
            'class_name' => '10 K',
            'teacher_id' => '31',
        ]);
        DB::table('classes')->insert([
            'class_name' => '11 Toán',
            'teacher_id' => '3',
        ]);
        DB::table('classes')->insert([
            'class_name' => '11 Lý',
            'teacher_id' => '24',
        ]);
        DB::table('classes')->insert([
            'class_name' => '11 Hoá',
            'teacher_id' => '27',
        ]);
        DB::table('classes')->insert([
            'class_name' => '11 Văn',
            'teacher_id' => '8',
        ]);
        DB::table('classes')->insert([
            'class_name' => '11 Anh',
            'teacher_id' => '13',
        ]);
        DB::table('classes')->insert([
            'class_name' => '11 Tin',
            'teacher_id' => '35',
        ]);
        DB::table('classes')->insert([
            'class_name' => '11 K',
            'teacher_id' => '32',
        ]);
        DB::table('classes')->insert([
            'class_name' => '12 Toán',
            'teacher_id' => '4',
        ]);
        DB::table('classes')->insert([
            'class_name' => '12 Lý',
            'teacher_id' => '25',
        ]);
        DB::table('classes')->insert([
            'class_name' => '12 Hoá',
            'teacher_id' => '28',
        ]);
        DB::table('classes')->insert([
            'class_name' => '12 Văn',
            'teacher_id' => '9',
        ]);
        DB::table('classes')->insert([
            'class_name' => '12 Anh',
            'teacher_id' => '14',
        ]);
        DB::table('classes')->insert([
            'class_name' => '12 Tin',
            'teacher_id' => '5',
        ]);
        DB::table('classes')->insert([
            'class_name' => '12 K',
            'teacher_id' => '31',
        ]);
    }
}
