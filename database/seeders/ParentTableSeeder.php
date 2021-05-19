<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 525; $i++) {
            DB::table('parents')->insert([
                'father_name' => 'Nguyễn Văn A',
                'father_phone_number' => '0982415395',
                'mother_name' => 'Nguyễn Thị B',
                'mother_phone_number' => '0977631495',
                'student_id' => $i,
            ]);
        }
    }
}
