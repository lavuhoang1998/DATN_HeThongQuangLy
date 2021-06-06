<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teachers')->insert([
            'MSGV' => 'GV0001',
            'user_id' => '3',
            'subject_id' => '14',
        ]);
        //-----------Toán------------------------------------------------
        DB::table('teachers')->insert([
            'MSGV' => 'GV0002',
            'user_id' => '4',
            'subject_id' => '1',
        ]);
        DB::table('teachers')->insert([
            'MSGV' => 'GV0003',
            'user_id' => '5',
            'subject_id' => '1',
        ]);
        DB::table('teachers')->insert([
            'MSGV' => 'GV0004',
            'user_id' => '6',
            'subject_id' => '1',
        ]);
        DB::table('teachers')->insert([
            'MSGV' => 'GV0005',
            'user_id' => '7',
            'subject_id' => '1',
        ]);
        DB::table('teachers')->insert([
            'MSGV' => 'GV0006',
            'user_id' => '8',
            'subject_id' => '1',
        ]);
        //-----------Ngữ văn------------------------------------------------
        DB::table('teachers')->insert([
            'MSGV' => 'GV0007',
            'user_id' => '9',
            'subject_id' => '2',
        ]);
        DB::table('teachers')->insert([
            'MSGV' => 'GV0008',
            'user_id' => '10',
            'subject_id' => '2',
        ]);
        DB::table('teachers')->insert([
            'MSGV' => 'GV0009',
            'user_id' => '11',
            'subject_id' => '2',
        ]);
        DB::table('teachers')->insert([
            'MSGV' => 'GV0010',
            'user_id' => '12',
            'subject_id' => '2',
        ]);
        DB::table('teachers')->insert([
            'MSGV' => 'GV0011',
            'user_id' => '13',
            'subject_id' => '2',
        ]);
        //-----------Ngoại ngữ------------------------------------------------
        DB::table('teachers')->insert([
            'MSGV' => 'GV0012',
            'user_id' => '14',
            'subject_id' => '3',
        ]);
        DB::table('teachers')->insert([
            'MSGV' => 'GV0013',
            'user_id' => '15',
            'subject_id' => '3',
        ]);
        DB::table('teachers')->insert([
            'MSGV' => 'GV0014',
            'user_id' => '16',
            'subject_id' => '3',
        ]);
        DB::table('teachers')->insert([
            'MSGV' => 'GV0015',
            'user_id' => '17',
            'subject_id' => '3',
        ]);
        //-----------Giáo dục thể chất---------------------
        DB::table('teachers')->insert([
            'MSGV' => 'GV0016',
            'user_id' => '18',
            'subject_id' => '4',
        ]);
        DB::table('teachers')->insert([
            'MSGV' => 'GV0017',
            'user_id' => '19',
            'subject_id' => '4',
        ]);
        DB::table('teachers')->insert([
            'MSGV' => 'GV0018',
            'user_id' => '20',
            'subject_id' => '4',
        ]);
        //-----------Lịch sử---------------------
        DB::table('teachers')->insert([
            'MSGV' => 'GV0019',
            'user_id' => '21',
            'subject_id' => '5',
        ]);
        DB::table('teachers')->insert([
            'MSGV' => 'GV0020',
            'user_id' => '22',
            'subject_id' => '5',
        ]);
        //-----------Địa lý----------------------
        DB::table('teachers')->insert([
            'MSGV' => 'GV0021',
            'user_id' => '23',
            'subject_id' => '6',
        ]);
        DB::table('teachers')->insert([
            'MSGV' => 'GV0022',
            'user_id' => '24',
            'subject_id' => '6',
        ]);
        //-----------Vật lý----------------------
        DB::table('teachers')->insert([
            'MSGV' => 'GV0023',
            'user_id' => '25',
            'subject_id' => '7',
        ]);
        DB::table('teachers')->insert([
            'MSGV' => 'GV0024',
            'user_id' => '26',
            'subject_id' => '7',
        ]);
        DB::table('teachers')->insert([
            'MSGV' => 'GV0025',
            'user_id' => '27',
            'subject_id' => '7',
        ]);
        //-----------Hóa học----------------------
        DB::table('teachers')->insert([
            'MSGV' => 'GV0026',
            'user_id' => '28',
            'subject_id' => '8',
        ]);
        DB::table('teachers')->insert([
            'MSGV' => 'GV0027',
            'user_id' => '29',
            'subject_id' => '8',
        ]);
        DB::table('teachers')->insert([
            'MSGV' => 'GV0028',
            'user_id' => '30',
            'subject_id' => '8',
        ]);
        //-----------Sinh học---------------------
        DB::table('teachers')->insert([
            'MSGV' => 'GV0029',
            'user_id' => '31',
            'subject_id' => '9',
        ]);
        DB::table('teachers')->insert([
            'MSGV' => 'GV0030',
            'user_id' => '32',
            'subject_id' => '9',
        ]);
        DB::table('teachers')->insert([
            'MSGV' => 'GV0031',
            'user_id' => '33',
            'subject_id' => '9',
        ]);
        //-----------Công nghệ---------------------
        DB::table('teachers')->insert([
            'MSGV' => 'GV0032',
            'user_id' => '34',
            'subject_id' => '10',
        ]);
        DB::table('teachers')->insert([
            'MSGV' => 'GV0033',
            'user_id' => '35',
            'subject_id' => '10',
        ]);
        //-----------Tin học-----------------------
        DB::table('teachers')->insert([
            'MSGV' => 'GV0034',
            'user_id' => '36',
            'subject_id' => '11',
        ]);
        DB::table('teachers')->insert([
            'MSGV' => 'GV0035',
            'user_id' => '37',
            'subject_id' => '11',
        ]);
    }
}
