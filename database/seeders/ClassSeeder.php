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
            'teacher_id' => '1',
        ]);
        DB::table('classes')->insert([
            'class_name' => '10 Lý',
            'teacher_id' => '1',
        ]);
        DB::table('classes')->insert([
            'class_name' => '10 Hoá',
            'teacher_id' => '1',
        ]);
        DB::table('classes')->insert([
            'class_name' => '10 Văn',
            'teacher_id' => '1',
        ]);
        DB::table('classes')->insert([
            'class_name' => '10 Anh',
            'teacher_id' => '1',
        ]);
        DB::table('classes')->insert([
            'class_name' => '10 Tin',
            'teacher_id' => '1',
        ]);
        DB::table('classes')->insert([
            'class_name' => '10 K',
            'teacher_id' => '1',
        ]);
        DB::table('classes')->insert([
            'class_name' => '11 Toán',
            'teacher_id' => '1',
        ]);
        DB::table('classes')->insert([
            'class_name' => '11 Lý',
            'teacher_id' => '1',
        ]);
        DB::table('classes')->insert([
            'class_name' => '11 Hoá',
            'teacher_id' => '1',
        ]);
        DB::table('classes')->insert([
            'class_name' => '11 Văn',
            'teacher_id' => '1',
        ]);
        DB::table('classes')->insert([
            'class_name' => '11 Anh',
            'teacher_id' => '1',
        ]);
        DB::table('classes')->insert([
            'class_name' => '11 Tin',
            'teacher_id' => '1',
        ]);
        DB::table('classes')->insert([
            'class_name' => '11 K',
            'teacher_id' => '1',
        ]);
        DB::table('classes')->insert([
            'class_name' => '12 Toán',
            'teacher_id' => '1',
        ]);
        DB::table('classes')->insert([
            'class_name' => '12 Lý',
            'teacher_id' => '1',
        ]);
        DB::table('classes')->insert([
            'class_name' => '12 Hoá',
            'teacher_id' => '1',
        ]);
        DB::table('classes')->insert([
            'class_name' => '12 Văn',
            'teacher_id' => '1',
        ]);
        DB::table('classes')->insert([
            'class_name' => '12 Anh',
            'teacher_id' => '1',
        ]);
        DB::table('classes')->insert([
            'class_name' => '12 Tin',
            'teacher_id' => '1',
        ]);
        DB::table('classes')->insert([
            'class_name' => '12 K',
            'teacher_id' => '1',
        ]);
    }
}
