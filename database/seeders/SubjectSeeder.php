<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->insert([
            'name' => 'Toán',
        ]);
        DB::table('subjects')->insert([
            'name' => 'Ngữ văn',
        ]);
        DB::table('subjects')->insert([
            'name' => 'Ngoại ngữ',
        ]);
        DB::table('subjects')->insert([
            'name' => 'Giáo dục thể chất',
        ]);
        DB::table('subjects')->insert([
            'name' => 'Lịch sử',
        ]);
        DB::table('subjects')->insert([
            'name' => 'Địa lý',
        ]);
        DB::table('subjects')->insert([
            'name' => 'Vật lý',
        ]);
        DB::table('subjects')->insert([
            'name' => 'Hóa học',
        ]);
        DB::table('subjects')->insert([
            'name' => 'Sinh học',
        ]);
        DB::table('subjects')->insert([
            'name' => 'Công nghệ',
        ]);
        DB::table('subjects')->insert([
            'name' => 'Tin học',
        ]);
        DB::table('subjects')->insert([
            'name' => 'Sinh hoạt lớp',
        ]);
        DB::table('subjects')->insert([
            'name' => 'Chào cờ',
        ]);
        DB::table('subjects')->insert([
            'name' => 'Trống',
        ]);
    }
}
