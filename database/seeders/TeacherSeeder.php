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
            'sex' => 'Nam',
            'date_of_birth' => '1970-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '3',
            'subject_id' => '14',
            'avt' => 'img/avt/teacher/GV0001.jpg',
        ]);
        //-----------Toán------------------------------------------------
        DB::table('teachers')->insert([
            'MSGV' => 'GV0002',
            'sex' => 'Nam',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '4',
            'subject_id' => '1',
            'avt' => 'img/avt/teacher/GV0001.jpg',
        ]);
        DB::table('teachers')->insert([
            'MSGV' => 'GV0003',
            'sex' => 'Nữ',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '5',
            'subject_id' => '1',
            'avt' => 'img/avt/teacher/GV0001.jpg',
        ]);
        DB::table('teachers')->insert([
            'MSGV' => 'GV0004',
            'sex' => 'Nam',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '6',
            'subject_id' => '1',
            'avt' => 'img/avt/teacher/GV0001.jpg',
        ]);
        DB::table('teachers')->insert([
            'MSGV' => 'GV0005',
            'sex' => 'Nữ',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '7',
            'subject_id' => '1',
            'avt' => 'img/avt/teacher/GV0001.jpg',
        ]);
        DB::table('teachers')->insert([
            'MSGV' => 'GV0006',
            'sex' => 'Nữ',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '8',
            'subject_id' => '1',
            'avt' => 'img/avt/teacher/GV0001.jpg',
        ]);
        //-----------Ngữ văn------------------------------------------------
        DB::table('teachers')->insert([
            'MSGV' => 'GV0007',
            'sex' => 'Nữ',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '9',
            'subject_id' => '2',
            'avt' => 'img/avt/teacher/GV0001.jpg',
        ]);
        DB::table('teachers')->insert([
            'MSGV' => 'GV0008',
            'sex' => 'Nữ',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '10',
            'subject_id' => '2',
            'avt' => 'img/avt/teacher/GV0001.jpg',
        ]);
        DB::table('teachers')->insert([
            'MSGV' => 'GV0009',
            'sex' => 'Nữ',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '11',
            'subject_id' => '2',
            'avt' => 'img/avt/teacher/GV0001.jpg',
        ]);
        DB::table('teachers')->insert([
            'MSGV' => 'GV0010',
            'sex' => 'Nữ',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '12',
            'subject_id' => '2',
            'avt' => 'img/avt/teacher/GV0001.jpg',
        ]);
        DB::table('teachers')->insert([
            'MSGV' => 'GV0011',
            'sex' => 'Nam',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '13',
            'subject_id' => '2',
            'avt' => 'img/avt/teacher/GV0001.jpg',
        ]);
        //-----------Ngoại ngữ------------------------------------------------
        DB::table('teachers')->insert([
            'MSGV' => 'GV0012',
            'sex' => 'Nam',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '14',
            'subject_id' => '3',
            'avt' => 'img/avt/teacher/GV0001.jpg',
        ]);
        DB::table('teachers')->insert([
            'MSGV' => 'GV0013',
            'sex' => 'Nữ',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '15',
            'subject_id' => '3',
            'avt' => 'img/avt/teacher/GV0001.jpg',
        ]);
        DB::table('teachers')->insert([
            'MSGV' => 'GV0014',
            'sex' => 'Nam',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '16',
            'subject_id' => '3',
            'avt' => 'img/avt/teacher/GV0001.jpg',
        ]);
        DB::table('teachers')->insert([
            'MSGV' => 'GV0015',
            'sex' => 'Nữ',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '17',
            'subject_id' => '3',
            'avt' => 'img/avt/teacher/GV0001.jpg',
        ]);
        //-----------Giáo dục thể chất---------------------
        DB::table('teachers')->insert([
            'MSGV' => 'GV0016',
            'sex' => 'Nam',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '18',
            'subject_id' => '4',
            'avt' => 'img/avt/teacher/GV0001.jpg',
        ]);
        DB::table('teachers')->insert([
            'MSGV' => 'GV0017',
            'sex' => 'Nam',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '19',
            'subject_id' => '4',
            'avt' => 'img/avt/teacher/GV0001.jpg',
        ]);
        DB::table('teachers')->insert([
            'MSGV' => 'GV0018',
            'sex' => 'Nữ',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '20',
            'subject_id' => '4',
            'avt' => 'img/avt/teacher/GV0001.jpg',
        ]);
        //-----------Lịch sử---------------------
        DB::table('teachers')->insert([
            'MSGV' => 'GV0019',
            'sex' => 'Nữ',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '21',
            'subject_id' => '5',
            'avt' => 'img/avt/teacher/GV0001.jpg',
        ]);
        DB::table('teachers')->insert([
            'MSGV' => 'GV0020',
            'sex' => 'Nữ',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '22',
            'subject_id' => '5',
            'avt' => 'img/avt/teacher/GV0001.jpg',
        ]);
        //-----------Địa lý----------------------
        DB::table('teachers')->insert([
            'MSGV' => 'GV0021',
            'sex' => 'Nữ',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '23',
            'subject_id' => '6',
            'avt' => 'img/avt/teacher/GV0001.jpg',
        ]);
        DB::table('teachers')->insert([
            'MSGV' => 'GV0022',
            'sex' => 'Nữ',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '24',
            'subject_id' => '6',
            'avt' => 'img/avt/teacher/GV0001.jpg',
        ]);
        //-----------Vật lý----------------------
        DB::table('teachers')->insert([
            'MSGV' => 'GV0023',
            'sex' => 'Nữ',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '25',
            'subject_id' => '7',
            'avt' => 'img/avt/teacher/GV0001.jpg',
        ]);
        DB::table('teachers')->insert([
            'MSGV' => 'GV0024',
            'sex' => 'Nam',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '26',
            'subject_id' => '7',
            'avt' => 'img/avt/teacher/GV0001.jpg',
        ]);
        DB::table('teachers')->insert([
            'MSGV' => 'GV0025',
            'sex' => 'Nam',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '27',
            'subject_id' => '7',
            'avt' => 'img/avt/teacher/GV0001.jpg',
        ]);
        //-----------Hóa học----------------------
        DB::table('teachers')->insert([
            'MSGV' => 'GV0026',
            'sex' => 'Nữ',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '28',
            'subject_id' => '8',
            'avt' => 'img/avt/teacher/GV0001.jpg',
        ]);
        DB::table('teachers')->insert([
            'MSGV' => 'GV0027',
            'sex' => 'Nữ',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '29',
            'subject_id' => '8',
            'avt' => 'img/avt/teacher/GV0001.jpg',
        ]);
        DB::table('teachers')->insert([
            'MSGV' => 'GV0028',
            'sex' => 'Nữ',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '30',
            'subject_id' => '8',
            'avt' => 'img/avt/teacher/GV0001.jpg',
        ]);
        //-----------Sinh học---------------------
        DB::table('teachers')->insert([
            'MSGV' => 'GV0029',
            'sex' => 'Nữ',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '31',
            'subject_id' => '9',
            'avt' => 'img/avt/teacher/GV0001.jpg',
        ]);
        DB::table('teachers')->insert([
            'MSGV' => 'GV0030',
            'sex' => 'Nữ',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '32',
            'subject_id' => '9',
            'avt' => 'img/avt/teacher/GV0001.jpg',
        ]);
        DB::table('teachers')->insert([
            'MSGV' => 'GV0031',
            'sex' => 'Nữ',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '33',
            'subject_id' => '9',
            'avt' => 'img/avt/teacher/GV0001.jpg',
        ]);
        //-----------Công nghệ---------------------
        DB::table('teachers')->insert([
            'MSGV' => 'GV0032',
            'sex' => 'Nữ',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '34',
            'subject_id' => '10',
            'avt' => 'img/avt/teacher/GV0001.jpg',
        ]);
        DB::table('teachers')->insert([
            'MSGV' => 'GV0033',
            'sex' => 'Nữ',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '35',
            'subject_id' => '10',
            'avt' => 'img/avt/teacher/GV0001.jpg',
        ]);
        //-----------Tin học-----------------------
        DB::table('teachers')->insert([
            'MSGV' => 'GV0034',
            'sex' => 'Nam',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '36',
            'subject_id' => '11',
            'avt' => 'img/avt/teacher/GV0001.jpg',
        ]);
        DB::table('teachers')->insert([
            'MSGV' => 'GV0035',
            'sex' => 'Nam',
            'date_of_birth' => '1998-11-06',
            'dia_chi' => '168 đường Kim Đồng, thành phố Yên Bái',
            'sdt' => '03299838383',
            'que_quan' => 'Nam Định',
            'dan_toc' => 'Kinh',
            'ton_giao' => 'Không',
            'user_id' => '37',
            'subject_id' => '11',
            'avt' => 'img/avt/teacher/GV0001.jpg',
        ]);
    }
}
