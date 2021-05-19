<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //-----------Admin Account---------------------
        DB::table('users')->insert([
            'name' => 'Nguyen Van A',
            'email' => 'nva@sms.admin.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '1',
        ]);

        DB::table('users')->insert([
            'name' => 'Nguyen Van B',
            'email' => 'nvb@sms.admin.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '1',
        ]);

        //-----------Teacher Account---------------------
        //-----------Trống---------------------
        DB::table('users')->insert([
            'name' => 'Trống',
            'email' => 'none@sms.teacher.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '2',
        ]);
        //-----------Toán---------------------
        DB::table('users')->insert([
            'name' => 'Nguyễn Văn Hà',
            'email' => 'ha.nv@sms.teacher.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '2',
        ]);

        DB::table('users')->insert([
            'name' => 'Nguyễn Thị Kim Vân',
            'email' => 'van.ntk@sms.teacher.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '2',
        ]);

        DB::table('users')->insert([
            'name' => 'Đặng Tuấn Thành',
            'email' => 'thanh.dt@sms.teacher.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '2',
        ]);

        DB::table('users')->insert([
            'name' => 'Nguyễn Hồng Nhung',
            'email' => 'nhung.nh@sms.teacher.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '2',
        ]);

        DB::table('users')->insert([
            'name' => 'Dương Thúy Quỳnh',
            'email' => 'quynh.dt@sms.teacher.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '2',
        ]);

        //-----------Ngữ văn---------------------
        DB::table('users')->insert([
            'name' => 'Lê Thị Thu Huyền',
            'email' => 'huyen.ltt@sms.teacher.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '2',
        ]);

        DB::table('users')->insert([
            'name' => 'Nguyễn Ngọc Anh',
            'email' => 'anh.nn@sms.teacher.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '2',
        ]);

        DB::table('users')->insert([
            'name' => 'Phạm Thanh Mai',
            'email' => 'mai.pt@sms.teacher.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '2',
        ]);

        DB::table('users')->insert([
            'name' => 'Nguyễn Thái Ly',
            'email' => 'ly.nt@sms.teacher.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '2',
        ]);

        DB::table('users')->insert([
            'name' => 'Nguyễn Thành Nam',
            'email' => 'nam.nt@sms.teacher.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '2',
        ]);

        //-----------Ngoại ngữ---------------------
        DB::table('users')->insert([
            'name' => 'Đặng Trần Hà',
            'email' => 'ha.dt@sms.teacher.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '2',
        ]);

        DB::table('users')->insert([
            'name' => 'Phùng Thị Hải Yến',
            'email' => 'yen.pth@sms.teacher.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '2',
        ]);

        DB::table('users')->insert([
            'name' => 'Lê Thị Cẩm Vân',
            'email' => 'van.ltc@sms.teacher.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '2',
        ]);

        DB::table('users')->insert([
            'name' => 'Nguyễn Thị Phương Liên',
            'email' => 'lien.ntp@sms.teacher.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '2',
        ]);

        //-----------Giáo dục thể chất---------------------
        DB::table('users')->insert([
            'name' => 'Lê Ngọc Lâm',
            'email' => 'lam.ln@sms.teacher.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '2',
        ]);

        DB::table('users')->insert([
            'name' => 'Phạm Thế Hùng',
            'email' => 'hung.pt@sms.teacher.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '2',
        ]);

        DB::table('users')->insert([
            'name' => 'Đinh Thị Ánh',
            'email' => 'anh.dt@sms.teacher.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '2',
        ]);
        //-----------Lịch sử---------------------
        DB::table('users')->insert([
            'name' => 'Nguyễn Thị Thanh Huyền',
            'email' => 'huyen.ntt@sms.teacher.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '2',
        ]);
        DB::table('users')->insert([
            'name' => 'Đoàn Thanh Mai',
            'email' => 'mai.dt@sms.teacher.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '2',
        ]);
        //-----------Địa lý---------------------
        DB::table('users')->insert([
            'name' => 'Nguyễn Thị Mai Thương',
            'email' => 'thuong.ntm@sms.teacher.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '2',
        ]);
        DB::table('users')->insert([
            'name' => 'Đỗ Thị Thu',
            'email' => 'thu.dt@sms.teacher.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '2',
        ]);
        //-----------Vật lý----------------------
        DB::table('users')->insert([
            'name' => 'Vũ Phương Lan',
            'email' => 'lan.vp@sms.teacher.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '2',
        ]);

        DB::table('users')->insert([
            'name' => 'Hoàng Ngọc Quang',
            'email' => 'quang.hn@sms.teacher.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '2',
        ]);

        DB::table('users')->insert([
            'name' => 'Nguyễn Văn Duy',
            'email' => 'duy.nv@sms.teacher.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '2',
        ]);
        //-----------Hóa học----------------------
        DB::table('users')->insert([
            'name' => 'Nguyễn Thị Loan',
            'email' => 'loan.nt@sms.teacher.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '2',
        ]);

        DB::table('users')->insert([
            'name' => 'Phạm Hải Linh',
            'email' => 'linh.ph@sms.teacher.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '2',
        ]);

        DB::table('users')->insert([
            'name' => 'Nguyễn Thu Trang',
            'email' => 'trang.nt@sms.teacher.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '2',
        ]);
        //-----------Sinh học---------------------
        DB::table('users')->insert([
            'name' => 'Phạm Thị Hồi',
            'email' => 'hoi.pt@sms.teacher.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '2',
        ]);

        DB::table('users')->insert([
            'name' => 'Ngô Thị Phương Thanh',
            'email' => 'thanh.ntp@sms.teacher.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '2',
        ]);

        DB::table('users')->insert([
            'name' => 'Mai Thu Hương',
            'email' => 'huong.mt@sms.teacher.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '2',
        ]);
        //-----------Công nghệ---------------------
        DB::table('users')->insert([
            'name' => 'Đinh Thị Thu Giang',
            'email' => 'giang.dt@sms.teacher.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '2',
        ]);
        DB::table('users')->insert([
            'name' => 'Khuất Thị Nga',
            'email' => 'nga.kt@sms.teacher.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '2',
        ]);
        //-----------Tin học-----------------------
        DB::table('users')->insert([
            'name' => 'Nguyễn Hồng Quân',
            'email' => 'quan.nh@sms.teacher.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '2',
        ]);
        DB::table('users')->insert([
            'name' => 'Nguyễn Đức Tuệ',
            'email' => 'tue.nd@sms.teacher.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '2',
        ]);

        //---------------------------------------------------------------
        //-----------Student Account---------------------
        //------------10 Toán------------------------
        DB::table('users')->insert([
            'name' => 'Nguyễn Ngọc Anh',
            'email' => 'anh.nn@sms.student.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '3',
        ]);

        DB::table('users')->insert([
            'name' => 'Phạm Lan Anh',
            'email' => 'anh.pl@sms.student.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '3',
        ]);

        DB::table('users')->insert([
            'name' => 'Nguyễn Tùng Anh',
            'email' => 'anh.nt@sms.student.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '3',
        ]);

        DB::table('users')->insert([
            'name' => 'Nguyễn Hải Băng',
            'email' => 'bang.nh@sms.student.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '3',
        ]);

        DB::table('users')->insert([
            'name' => 'Nguyễn Văn Chiến',
            'email' => 'chien.nv@sms.student.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '3',
        ]);

        DB::table('users')->insert([
            'name' => 'Phan Văn Đức',
            'email' => 'duc.pv@sms.student.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '3',
        ]);

        DB::table('users')->insert([
            'name' => 'Tạ Văn Đông',
            'email' => 'dong.tv@sms.student.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '3',
        ]);

        DB::table('users')->insert([
            'name' => 'Lê Thị Giang',
            'email' => 'giang.lt@sms.student.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '3',
        ]);

        DB::table('users')->insert([
            'name' => 'Nguyễn Khánh Hải',
            'email' => 'hai.nk@sms.student.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '3',
        ]);

        DB::table('users')->insert([
            'name' => 'Phạm Thị Hiền',
            'email' => 'hien.pt@sms.student.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '3',
        ]);

        DB::table('users')->insert([
            'name' => 'Lê Phương Hoa',
            'email' => 'hoa.lp@sms.student.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '3',
        ]);

        DB::table('users')->insert([
            'name' => 'Nguyễn Phương Hoa',
            'email' => 'hoa.np@sms.student.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '3',
        ]);

        DB::table('users')->insert([
            'name' => 'Lã Vũ Hoàng',
            'email' => 'hoang.lv@sms.student.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '3',
        ]);

        DB::table('users')->insert([
            'name' => 'Nguyễn Quang Huy',
            'email' => 'huy.nq@sms.student.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '3',
        ]);

        DB::table('users')->insert([
            'name' => 'Nguyễn Khánh Huyền',
            'email' => 'huyen.nk@sms.student.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '3',
        ]);

        DB::table('users')->insert([
            'name' => 'Lê Ngọc Lan',
            'email' => 'lan.ln@sms.student.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '3',
        ]);

        DB::table('users')->insert([
            'name' => 'Nguyễn Ngọc Luân',
            'email' => 'luan.nn@sms.student.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '3',
        ]);

        DB::table('users')->insert([
            'name' => 'Trần Hoài Nam',
            'email' => 'nam.th@sms.student.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '3',
        ]);

        DB::table('users')->insert([
            'name' => 'Trần Bảo Ngọc',
            'email' => 'ngoc.tb@sms.student.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '3',
        ]);

        DB::table('users')->insert([
            'name' => 'Nguyễn Ngọc Nhi',
            'email' => 'nhi.nn@sms.student.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '3',
        ]);

        DB::table('users')->insert([
            'name' => 'Nguyễn Anh Thư',
            'email' => 'thu.na@sms.student.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '3',
        ]);

        DB::table('users')->insert([
            'name' => 'Nguyễn Quang Vinh',
            'email' => 'vinh.nq@sms.student.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '3',
        ]);

        DB::table('users')->insert([
            'name' => 'Hoàng Lê Vy',
            'email' => 'vy.hl@sms.student.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '3',
        ]);

        DB::table('users')->insert([
            'name' => 'Lê Hải Yến',
            'email' => 'yen.lh@sms.student.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '3',
        ]);

        DB::table('users')->insert([
            'name' => 'Nguyễn Thị Hải Yến',
            'email' => 'yen.nth@sms.student.cyb.edu.com',
            'password' => Hash::make('123456789'),
            'trang_thai' => '1',
            'role_id' => '3',
        ]);

        for ($i=2; $i<=21; $i++) {
            for ($j='A'; $j<='Y'; $j++) {
                DB::table('users')->insert([
                    'name' => 'Nguyen Van '.$j.$i,
                    'email' => $j.$i.'.nv@sms.student.cyb.edu.com',
                    'password' => Hash::make('123456789'),
                    'trang_thai' => '1',
                    'role_id' => '3',
                ]);
            }}












    }
}
