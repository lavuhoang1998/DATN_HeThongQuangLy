<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'role_name' => 'admin',
            'description' => 'Ban giám hiệu',
        ]);
        DB::table('roles')->insert([
            'role_name' => 'teacher',
            'description' => 'Giáo viên',
        ]);
        DB::table('roles')->insert([
            'role_name' => 'student',
            'description' => 'Học sinh',
        ]);
    }
}
