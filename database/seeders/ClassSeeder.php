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
        ]);
        DB::table('classes')->insert([
            'class_name' => '10 Lý',
        ]);
        DB::table('classes')->insert([
            'class_name' => '10 Hoá',
        ]);
        DB::table('classes')->insert([
            'class_name' => '10 Văn',
        ]);
        DB::table('classes')->insert([
            'class_name' => '10 Anh',
        ]);
        DB::table('classes')->insert([
            'class_name' => '10 Tin',
        ]);
        DB::table('classes')->insert([
            'class_name' => '10 K',
        ]);
        DB::table('classes')->insert([
            'class_name' => '11 Toán',
        ]);
        DB::table('classes')->insert([
            'class_name' => '11 Lý',
        ]);
        DB::table('classes')->insert([
            'class_name' => '11 Hoá',
        ]);
        DB::table('classes')->insert([
            'class_name' => '11 Văn',
        ]);
        DB::table('classes')->insert([
            'class_name' => '11 Anh',
        ]);
        DB::table('classes')->insert([
            'class_name' => '11 Tin',
        ]);
        DB::table('classes')->insert([
            'class_name' => '11 K',
        ]);
        DB::table('classes')->insert([
            'class_name' => '12 Toán',
        ]);
        DB::table('classes')->insert([
            'class_name' => '12 Lý',
        ]);
        DB::table('classes')->insert([
            'class_name' => '12 Hoá',
        ]);
        DB::table('classes')->insert([
            'class_name' => '12 Văn',
        ]);
        DB::table('classes')->insert([
            'class_name' => '12 Anh',
        ]);
        DB::table('classes')->insert([
            'class_name' => '12 Tin',
        ]);
        DB::table('classes')->insert([
            'class_name' => '12 K',
        ]);
        DB::table('classes')->insert([
            'class_name' => 'Đã tốt nghiệp',
        ]);
    }
}
