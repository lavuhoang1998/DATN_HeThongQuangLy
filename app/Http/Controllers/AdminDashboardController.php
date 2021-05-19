<?php

namespace App\Http\Controllers;

use App\Models\CLasss;
use App\Models\ParentOfStudent;
use App\Models\Admin;
use App\Models\Point;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teach;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\Types\Null_;

class AdminDashboardController extends Controller
{
    public function showDashboard()
    {
        $user_login = Auth::user();
        $user_login_id = $user_login->id;
        $admin_info = Admin::where('user_id', $user_login_id)->first();
        //dd($parent_info);
        return view('dashboard.dashboard-admin.home', ['user' => $user_login, 'admin_info' => $admin_info]);
    }

    public function showEditProfile()
    {
        $user_login = Auth::user();
        $user_login_id = $user_login->id;
        $admin_info = Admin::where('user_id', $user_login_id)->first();
        return view('dashboard.dashboard-admin.editProfile', ['user' => $user_login, 'admin_info' => $admin_info,]);
    }

    public function showEditPassword()
    {
        $user_login = Auth::user();
        $user_login_id = $user_login->id;
        $admin_info = Admin::where('user_id', $user_login_id)->first();
        return view('dashboard.dashboard-admin.editPassword', ['user' => $user_login, 'admin_info' => $admin_info,]);
    }

    public function postEditProfile(Request $request)
    {
        $user_login = Auth::user();
        $user_login_id = $user_login->id;
        $admin_info = Admin::where('user_id', $user_login_id)->first();

        $admin_info->sex = $request->input('sex');
        $admin_info->dia_chi = $request->input('address');
        $admin_info->que_quan = $request->input('que_quan');
        $admin_info->dan_toc = $request->input('dan_toc');
        $admin_info->ton_giao = $request->input('ton_giao');
        $admin_info->sdt = $request->input('phone_number');
        $admin_info->save();
        return redirect('sms_admin/editProfile')->with('alert', 'Cập nhật thông tin thành công!');
    }

    public function postEditPassword(Request $request)
    {
        $user_login = Auth::user();
        if ($request->input('new_password') != $request->input('new_password1')) {
            return redirect('sms_admin/editPassword')->with('alert', 'Cập nhật mật khẩu không thành công. Nhập lại mật khẩu mới không trùng khớp!');
        } else {
            $user_login->password = Hash::make($request->input('new_password'));
            $user_login->save();
            return redirect('sms_admin/editPassword')->with('alert', 'Cập nhật mật khẩu thành công!');
        }
    }

    public function showStudentManage()
    {
        $user_login = Auth::user();
        $user_login_id = $user_login->id;
        $admin_info = Admin::where('user_id', $user_login_id)->first();
        $students = User::where('role_id', 3)->orderByDesc('id')->simplePaginate(15);

        return view('dashboard.dashboard-admin.studentManage', ['user' => $user_login, 'admin_info' => $admin_info, 'students' => $students]);
    }

    public function postAddStudent(Request $request)
    {
        $user = User::where('email', $request->input('new_email'))->first();
        if ($user != null) {
            return redirect(route('studentManager'))->with('alert', 'Email này đã tồn tại!');
        } else {
            User::create([
                'name' => $request->input('new_name'),
                'email' => $request->input('new_email'),
                'password' => Hash::make($request->input('new_password')),
                'role_id' => 3,
                'trang_thai' => 1,
            ]);
            $users = User::where('role_id', 3)->get();
            $last_id = $users->max('id');
            Student::create([
                'MSHS' => ' ',
                'sex' => ' ',
                'date_of_birth' => '2020-12-12',
                'dia_chi' => ' ',
                'sdt' => ' ',
                'que_quan' => ' ',
                'dan_toc' => ' ',
                'ton_giao' => ' ',
                'avt' => ' ',
                'user_id' => $last_id,
                'class_id' => '1',
            ]);
            $students = Student::where('user_id', $last_id)->first();
            ParentOfStudent::create([
                'father_name' => ' ',
                'father_phone_number' => ' ',
                'mother_name' => ' ',
                'mother_phone_number' => ' ',
                'student_id' => $students->id,
            ]);
            for ($i = 1; $i <= 11; $i++) {
                Point::create([
                    'heso1' => ' ',
                    'heso2' => ' ',
                    'heso3' => ' ',
                    'trungbinh' => ' ',
                    'student_id' => $students->id,
                    'subject_id' => $i,
                ]);
            }
            return redirect()->route('studentEdit', ['user_id' => $last_id]);
        }
    }

    public function showStudentProfile($user_id)
    {
        $user_login = Auth::user();
        $user_login_id = $user_login->id;
        $admin_info = Admin::where('user_id', $user_login_id)->first();

        $student_info = User::where('id', $user_id)->first();
        $student_info1 = Student::where('user_id', $user_id)->first();
        $student_info2 = ParentOfStudent::where('student_id', $student_info1->id)->first();

        $class_id = $student_info1->class_id;
        $class_info = CLasss::where('id', $class_id)->first();
        $teacher_info = Teacher::where('id', $class_info->teacher_id)->first();
        $teacher_info1 = User::where('id', $teacher_info->user_id)->first();
        return view('dashboard.dashboard-admin.studentProfile', ['user' => $user_login, 'admin_info' => $admin_info, 'student_info' => $student_info, 'student_info1' => $student_info1, 'student_info2' => $student_info2, 'class_info' => $class_info, 'teacher_info1' => $teacher_info1]);
    }

    public function showStudentEdit($user_id)
    {
        $user_login = Auth::user();
        $user_login_id = $user_login->id;
        $admin_info = Admin::where('user_id', $user_login_id)->first();

        $student_info = User::where('id', $user_id)->first();
        $student_info1 = Student::where('user_id', $user_id)->first();
        return view('dashboard.dashboard-admin.studentEdit', ['user' => $user_login, 'admin_info' => $admin_info, 'student_info' => $student_info, 'student_info1' => $student_info1]);
    }

    public function postStudentEdit(Request $request, $user_id)
    {
        $user = User::where('id', $user_id)->first();
        $student = Student::where('user_id', $user->id)->first();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        $student->MSHS = $request->input('MSHS');
        $student->avt = $request->input('avt');
        $student->date_of_birth = $request->input('DoB');

        $class_name = $request->input('class_name');
        $class_id = CLasss::where('class_name', $class_name)->first()->id;
        $student->class_id = $class_id;

        $student->save();
        return redirect()->route('studentEdit', ['user_id' => $user_id])->with('alert', 'Cập nhật thông tin thành công!');
    }

    public function deleteStudent($user_id)
    {
        $user = User::where('id', $user_id)->first();
        $user->trang_thai = 0;
        $user->save();
//        $user->delete();
        return redirect()->route('studentManager')->with('alert', 'Xoá tài khoản thành công!');
    }

    public function showTeacherManage()
    {
        $user_login = Auth::user();
        $user_login_id = $user_login->id;
        $admin_info = Admin::where('user_id', $user_login_id)->first();
        $teachers = User::where('role_id', 2)->orderByDesc('id')->simplePaginate(15);;
        return view('dashboard.dashboard-admin.teacherManage', ['user' => $user_login, 'admin_info' => $admin_info, 'teachers' => $teachers]);
    }

    public function postAddTeacher(Request $request)
    {
        $user = User::where('email', $request->input('new_email'))->first();
        if ($user != null) {
            return redirect(route('teacherManager'))->with('alert', 'Email này đã tồn tại!');
        } else {
            User::create([
                'name' => $request->input('new_name'),
                'email' => $request->input('new_email'),
                'password' => Hash::make($request->input('new_password')),
                'role_id' => 2,
                'trang_thai' => 1,
            ]);
            $users = User::where('role_id', 2)->get();
            $last_id = $users->max('id');
            Teacher::create([
                'MSGV' => ' ',
                'sex' => ' ',
                'date_of_birth' => '2020-12-12',
                'dia_chi' => ' ',
                'sdt' => ' ',
                'que_quan' => ' ',
                'dan_toc' => ' ',
                'ton_giao' => ' ',
                'avt' => ' ',
                'user_id' => $last_id,
                'subject_id' => '14',
            ]);
            return redirect()->route('teacherEdit', ['user_id' => $last_id]);
        }
    }

    public function showTeacherProfile($user_id)
    {
        $user_login = Auth::user();
        $user_login_id = $user_login->id;
        $admin_info = Admin::where('user_id', $user_login_id)->first();

        $teacher_info = User::where('id', $user_id)->first();
        $teacher_info1 = Teacher::where('user_id', $user_id)->first();

        return view('dashboard.dashboard-admin.teacherProfile', ['user' => $user_login, 'admin_info' => $admin_info, 'teacher_info' => $teacher_info, 'teacher_info1' => $teacher_info1]);
    }

    public function showTeacherEdit($user_id)
    {
        $user_login = Auth::user();
        $user_login_id = $user_login->id;
        $admin_info = Admin::where('user_id', $user_login_id)->first();

        $teacher_info = User::where('id', $user_id)->first();
        $teacher_info1 = Teacher::where('user_id', $user_id)->first();
        return view('dashboard.dashboard-admin.teacherEdit', ['user' => $user_login, 'admin_info' => $admin_info, 'teacher_info' => $teacher_info, 'teacher_info1' => $teacher_info1]);
    }

    public function postTeacherEdit(Request $request, $user_id)
    {
        $user = User::where('id', $user_id)->first();
        $teacher = Teacher::where('user_id', $user->id)->first();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        $teacher->MSGV = $request->input('MSGV');
        $teacher->avt = $request->input('avt');
        $teacher->date_of_birth = $request->input('DoB');

        $subject_name = $request->input('subject_name');
        $subject_id = Subject::where('name', $subject_name)->first()->id;
        $teacher->subject_id = $subject_id;

        $teacher->save();
        return redirect()->route('teacherEdit', ['user_id' => $user_id])->with('alert', 'Cập nhật thông tin thành công!');
    }

    public function deleteTeacher($user_id)
    {
        $user = User::where('id', $user_id)->first();
        $user->trang_thai = 0;
        $user->save();
        //$user->delete();
        return redirect()->route('teacherManager')->with('alert', 'Xoá tài khoản thành công!');
    }

    public function showTimeTable()
    {
        $user_login = Auth::user();
        $user_login_id = $user_login->id;
        $admin_info = Admin::where('user_id', $user_login_id)->first();

        return view('dashboard.dashboard-admin.showTimeTable', ['user' => $user_login, 'admin_info' => $admin_info]);
    }

    public function showEditTimeTable()
    {
        $user_login = Auth::user();
        $user_login_id = $user_login->id;
        $admin_info = Admin::where('user_id', $user_login_id)->first();

        return view('dashboard.dashboard-admin.editTimeTable', ['user' => $user_login, 'admin_info' => $admin_info]);
    }

    public function showTimeTableForClass($class_id)
    {
        $user_login = Auth::user();
        $user_login_id = $user_login->id;
        $admin_info = Admin::where('user_id', $user_login_id)->first();

        $class = CLasss::where('id', $class_id)->first();

        $t12 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '1')->where('teaches.day', '2')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t13 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '1')->where('teaches.day', '3')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t14 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '1')->where('teaches.day', '4')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t15 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '1')->where('teaches.day', '5')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t16 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '1')->where('teaches.day', '6')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t17 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '1')->where('teaches.day', '7')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t22 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '2')->where('teaches.day', '2')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t23 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '2')->where('teaches.day', '3')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t24 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '2')->where('teaches.day', '4')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t25 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '2')->where('teaches.day', '5')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t26 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '2')->where('teaches.day', '6')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t27 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '2')->where('teaches.day', '7')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t32 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '3')->where('teaches.day', '2')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t33 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '3')->where('teaches.day', '3')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t34 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '3')->where('teaches.day', '4')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t35 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '3')->where('teaches.day', '5')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t36 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '3')->where('teaches.day', '6')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t37 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '3')->where('teaches.day', '7')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t42 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '4')->where('teaches.day', '2')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t43 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '4')->where('teaches.day', '3')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t44 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '4')->where('teaches.day', '4')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t45 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '4')->where('teaches.day', '5')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t46 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '4')->where('teaches.day', '6')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t47 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '4')->where('teaches.day', '7')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t52 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '5')->where('teaches.day', '2')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t53 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '5')->where('teaches.day', '3')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t54 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '5')->where('teaches.day', '4')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t55 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '5')->where('teaches.day', '5')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t56 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '5')->where('teaches.day', '6')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t57 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '5')->where('teaches.day', '7')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        return view('dashboard.dashboard-admin.showTimeTable1', ['user' => $user_login, 'admin_info' => $admin_info, 'class' => $class,
            't12' => $t12, 't13' => $t13, 't14' => $t14, 't15' => $t15, 't16' => $t16, 't17' => $t17,
            't22' => $t22, 't23' => $t23, 't24' => $t24, 't25' => $t25, 't26' => $t26, 't27' => $t27,
            't32' => $t32, 't33' => $t33, 't34' => $t34, 't35' => $t35, 't36' => $t36, 't37' => $t37,
            't42' => $t42, 't43' => $t43, 't44' => $t44, 't45' => $t45, 't46' => $t46, 't47' => $t47,
            't52' => $t52, 't53' => $t53, 't54' => $t54, 't55' => $t55, 't56' => $t56, 't57' => $t57,]);
    }

    public function editTimeTableForClass($class_id)
    {
        $user_login = Auth::user();
        $user_login_id = $user_login->id;
        $admin_info = Admin::where('user_id', $user_login_id)->first();

        $subject_list = Subject::all();
        $teacher_list = User::join('teachers', 'users.id', '=', 'teachers.user_id')
            ->get(['users.name']);
        $class = CLasss::where('id', $class_id)->first();

        $t12 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '1')->where('teaches.day', '2')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t13 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '1')->where('teaches.day', '3')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t14 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '1')->where('teaches.day', '4')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t15 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '1')->where('teaches.day', '5')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t16 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '1')->where('teaches.day', '6')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t17 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '1')->where('teaches.day', '7')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t22 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '2')->where('teaches.day', '2')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t23 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '2')->where('teaches.day', '3')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t24 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '2')->where('teaches.day', '4')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t25 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '2')->where('teaches.day', '5')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t26 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '2')->where('teaches.day', '6')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t27 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '2')->where('teaches.day', '7')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t32 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '3')->where('teaches.day', '2')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t33 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '3')->where('teaches.day', '3')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t34 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '3')->where('teaches.day', '4')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t35 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '3')->where('teaches.day', '5')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t36 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '3')->where('teaches.day', '6')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t37 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '3')->where('teaches.day', '7')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t42 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '4')->where('teaches.day', '2')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t43 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '4')->where('teaches.day', '3')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t44 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '4')->where('teaches.day', '4')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t45 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '4')->where('teaches.day', '5')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t46 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '4')->where('teaches.day', '6')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t47 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '4')->where('teaches.day', '7')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t52 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '5')->where('teaches.day', '2')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t53 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '5')->where('teaches.day', '3')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t54 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '5')->where('teaches.day', '4')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t55 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '5')->where('teaches.day', '5')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t56 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '5')->where('teaches.day', '6')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t57 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '5')->where('teaches.day', '7')
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        return view('dashboard.dashboard-admin.editTimeTable1', ['user' => $user_login, 'admin_info' => $admin_info, 'subjects' => $subject_list, 'teachers' => $teacher_list, 'class' => $class,
            't12' => $t12, 't13' => $t13, 't14' => $t14, 't15' => $t15, 't16' => $t16, 't17' => $t17,
            't22' => $t22, 't23' => $t23, 't24' => $t24, 't25' => $t25, 't26' => $t26, 't27' => $t27,
            't32' => $t32, 't33' => $t33, 't34' => $t34, 't35' => $t35, 't36' => $t36, 't37' => $t37,
            't42' => $t42, 't43' => $t43, 't44' => $t44, 't45' => $t45, 't46' => $t46, 't47' => $t47,
            't52' => $t52, 't53' => $t53, 't54' => $t54, 't55' => $t55, 't56' => $t56, 't57' => $t57,]);
    }

    public function postTimeTableEdit($class_id, Request $request)
    {
        $teacher_id = Teacher::join('users', 'users.id', '=', 'teachers.user_id')
            ->where('users.name', $request->input('teacher'))
            ->first('teachers.id');

        $subject = Subject::where('name', $request->input('subject'))
            ->first();

        $test = Teach::where('day', $request->input('day'))
            ->where('shift', $request->input('shift'))
            ->where('teacher_id', $teacher_id->id)
            ->first();
        //dd($test->subject_id);

        if ($test == null){
            $teach = Teach::where('class_id', $class_id)
                ->where('day', $request->input('day'))
                ->where('shift', $request->input('shift'))
                ->first();

            $teach->teacher_id = $teacher_id->id;
            $teach->subject_id = $subject->id;
            $teach->save();

            return redirect()->route('editTimeTable', ['class_id' => $class_id]);
        }
        elseif ($test->subject_id == '14'){
            $teach = Teach::where('class_id', $class_id)
                ->where('day', $request->input('day'))
                ->where('shift', $request->input('shift'))
                ->first();
            $teach->teacher_id = '1';
            $teach->subject_id = '14';
            $teach->save();
            return redirect()->route('editTimeTable', ['class_id' => $class_id]);
        }
        else {
            return redirect()->route('editTimeTable', ['class_id' => $class_id])->with('alert', 'Giáo viên này đã có lịch dạy lớp khác!');
        }
    }

    public function deleteTimeTableForClass($class_id)
    {
        $teaches = Teach::where('class_id', $class_id)->get();

        foreach ($teaches as $teach) {
            $teach->subject_id = '14';
            $teach->teacher_id = '1';
            $teach->save();
        }
        return redirect()->route('editTimeTable', ['class_id' => $class_id])->with('alert', 'Xoá thời khoá biểu thành công!');
    }

}
