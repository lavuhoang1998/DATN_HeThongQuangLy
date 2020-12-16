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
        DB::table('parents')->insert([
            'father_name' => 'Lã Anh Tuấn',
            'father_phone_number' => '0982415395',
            'mother_name' => 'Vũ Minh Chúc',
            'mother_phone_number' => '0977631495',
            'student_id' => '1',
        ]);

        DB::table('parents')->insert([
            'father_name' => 'Nguỹen Van F1',
            'father_phone_number' => '098765432',
            'mother_name' => 'Nguỹen Thi F1',
            'mother_phone_number' => '098765423',
            'student_id' => '2',
        ]);
    }
}
