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
            'name' => 'toán',
        ]);
        DB::table('subjects')->insert([
            'name' => 'ngữ văn',
        ]);
        DB::table('subjects')->insert([
            'name' => 'ngoại ngữ',
        ]);
        DB::table('subjects')->insert([
            'name' => 'giáo dục thể chất',
        ]);
        DB::table('subjects')->insert([
            'name' => 'lịch sử',
        ]);
        DB::table('subjects')->insert([
            'name' => 'địa lý',
        ]);
        DB::table('subjects')->insert([
            'name' => 'vật lý',
        ]);
        DB::table('subjects')->insert([
            'name' => 'hóa học',
        ]);
        DB::table('subjects')->insert([
            'name' => 'sinh học',
        ]);
        DB::table('subjects')->insert([
            'name' => 'công nghệ',
        ]);
        DB::table('subjects')->insert([
            'name' => 'tin học',
        ]);
        DB::table('subjects')->insert([
            'name' => 'sinh hoạt lớp',
        ]);
        DB::table('subjects')->insert([
            'name' => 'chào cờ',
        ]);
        DB::table('subjects')->insert([
            'name' => 'trống',
        ]);
    }
}
