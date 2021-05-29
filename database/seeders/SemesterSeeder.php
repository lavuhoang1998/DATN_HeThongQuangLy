<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('semesters')->insert([
            'semester_name' => '20181',
            'cur_semester' => '0',
        ]);
        DB::table('semesters')->insert([
            'semester_name' => '20182',
            'cur_semester' => '0',
        ]);
        DB::table('semesters')->insert([
            'semester_name' => '20191',
            'cur_semester' => '0',
        ]);
        DB::table('semesters')->insert([
            'semester_name' => '20192',
            'cur_semester' => '0',
        ]);
        DB::table('semesters')->insert([
            'semester_name' => '20201',
            'cur_semester' => '0',
        ]);
        DB::table('semesters')->insert([
            'semester_name' => '20202',
            'cur_semester' => '1',
        ]);
    }
}
