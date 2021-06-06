<?php

namespace App\Http\Controllers;

use App\Models\CLasss;
use App\Models\ParentOfStudent;
use App\Models\Admin;
use App\Models\Point;
use App\Models\Semester;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teach;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\Types\Null_;

class AdminDashboardController extends Controller
{
    public function showDashboard()
    {
        $user_login = Auth::user();
        $user_login_id = $user_login->id;
        $admin_info = Admin::where('user_id', $user_login_id)->first();
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

        $user_login->sex = $request->input('sex');
        $user_login->dia_chi = $request->input('address');
        $user_login->que_quan = $request->input('que_quan');
        $user_login->dan_toc = $request->input('dan_toc');
        $user_login->ton_giao = $request->input('ton_giao');
        $user_login->sdt = $request->input('phone_number');
        $user_login->save();
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
        $students = User::where('role_id', 3)->orderBy('id', 'desc')->simplePaginate(15);

        return view('dashboard.dashboard-admin.studentManage', ['user' => $user_login, 'admin_info' => $admin_info, 'students' => $students]);
    }


    public function showStudentManageByName(Request $request)
    {
        $user_login = Auth::user();
        $user_login_id = $user_login->id;
        $admin_info = Admin::where('user_id', $user_login_id)->first();
        $name = $request->input('search');
        $students = User::where('role_id','=', '3')
            ->where('name', 'like', '%' . $name . '%')
            ->orderBy('id', 'asc')
            ->simplePaginate(15);

        return view('dashboard.dashboard-admin.studentManage', ['user' => $user_login, 'admin_info' => $admin_info, 'students' => $students]);
    }

    public function postAddStudent(Request $request)
    {
        $user = User::where('email', $request->input('new_email'))->first();
        $cur_semester = Semester::where('cur_semester', '1')->first();

        if ($user != null) {
            return redirect(route('studentManager'))->with('alert', 'Email này đã tồn tại!');
        } else {
            User::create([
                'name' => $request->input('new_name'),
                'email' => $request->input('new_email'),
                'password' => Hash::make($request->input('new_password')),
                'role_id' => 3,
                'trang_thai' => 1,
                'sex' => ' ',
                'date_of_birth' => '2020-12-12',
                'dia_chi' => ' ',
                'sdt' => ' ',
                'que_quan' => ' ',
                'dan_toc' => ' ',
                'ton_giao' => ' ',
                'avt' => ' ',
            ]);
            $users = User::where('role_id', 3)->get();
            $last_id = $users->max('id');
            Student::create([
                'MSHS' => ' ',
                'user_id' => $last_id,
                'class_id' => '1',
            ]);
            $student = Student::where('user_id', $last_id)->first();
            ParentOfStudent::create([
                'father_name' => ' ',
                'father_phone_number' => ' ',
                'mother_name' => ' ',
                'mother_phone_number' => ' ',
                'student_id' => $student->id,
            ]);
            for ($i = 1; $i <= 11; $i++) {
                Point::create([
                    'heso1' => ' ',
                    'heso2' => ' ',
                    'heso3' => ' ',
                    'trungbinh' => ' ',
                    'student_id' => $student->id,
                    'subject_id' => $i,
                    'semester_id' => $cur_semester->id,
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
        return view('dashboard.dashboard-admin.studentProfile', ['user' => $user_login, 'admin_info' => $admin_info, 'student_info' => $student_info, 'student_info1' => $student_info1, 'student_info2' => $student_info2, 'class_info' => $class_info, 'teacher_info1' => $teacher_info1,]);
    }

    public function showStudentPoint($student_id){
        $user_login = Auth::user();
        $user_login_id = $user_login->id;
        $admin_info = Admin::where('user_id', $user_login_id)->first();

        $student_info1 = Student::where('id', $student_id)->first();
        $student_info = User::where('id', $student_info1->user_id)->first();

        $points = Point::join('semesters','semesters.id','=','points.semester_id')
            ->join('subjects','subjects.id','=','points.subject_id')
            ->where('points.student_id',$student_info1->id)
            ->orderBy('semester_name', 'ASC')
            ->simplePaginate(11);

        return view('dashboard.dashboard-admin.studentPoint', ['user' => $user_login, 'admin_info' => $admin_info, 'student_info' => $student_info, 'student_info1' => $student_info1, 'points'=>$points]);
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
        $cur_semester = Semester::where('cur_semester', '1')->first();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->avt = $request->input('avt');
        $user->date_of_birth = $request->input('DoB');
        $user->save();

        $student->MSHS = $request->input('MSHS');
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
        $teachers = User::where('role_id', 2)->orderBy('id', 'desc')->simplePaginate(15);;
        return view('dashboard.dashboard-admin.teacherManage', ['user' => $user_login, 'admin_info' => $admin_info, 'teachers' => $teachers]);
    }


    public function showTeacherManageByName(Request $request)
    {
        $user_login = Auth::user();
        $user_login_id = $user_login->id;
        $admin_info = Admin::where('user_id', $user_login_id)->first();
        $name = $request->input('search');
        $teachers = User::where('role_id', 2)
            ->where('name', 'like', '%' . $name . '%')
            ->orderBy('id', 'asc')->simplePaginate(15);

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
                'sex' => ' ',
                'date_of_birth' => '2020-12-12',
                'dia_chi' => ' ',
                'sdt' => ' ',
                'que_quan' => ' ',
                'dan_toc' => ' ',
                'ton_giao' => ' ',
                'avt' => ' ',
            ]);
            $users = User::where('role_id', 2)->get();
            $last_id = $users->max('id');
            Teacher::create([
                'MSGV' => ' ',
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

        $subject = Subject::where('id', $teacher_info1->subject_id)->first();

        return view('dashboard.dashboard-admin.teacherProfile', ['user' => $user_login, 'admin_info' => $admin_info, 'teacher_info' => $teacher_info, 'teacher_info1' => $teacher_info1, 'subject'=>$subject]);
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
        $user->avt = $request->input('avt');
        $user->date_of_birth = $request->input('DoB');
        $user->save();

        $teacher->MSGV = $request->input('MSGV');

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

    public function showTimeTableByClass($class_name)
    {
        //dd($class_name);
        $user_login = Auth::user();
        $user_login_id = $user_login->id;
        $admin_info = Admin::where('user_id', $user_login_id)->first();
        $class = CLasss::where('class_name',$class_name)->first();

        $semesters = Semester::where('id','>=',$class->semester_id)
            ->where('id','<=',$class->semester_id+5)
            ->get();


        return view('dashboard.dashboard-admin.showTimeTable2', ['user' => $user_login, 'admin_info' => $admin_info, 'semesters'=>$semesters, 'class'=>$class]);
    }



    public function showTimeTableBySemester($class_name, $semester_id)
    {
        $user_login = Auth::user();
        $user_login_id = $user_login->id;
        $admin_info = Admin::where('user_id', $user_login_id)->first();

        $class = CLasss::where('class_name',$class_name)->first();
        $class_id = $class->id;

        $semesters = Semester::where('id','>=',$class->semester_id)
            ->where('id','<=',$class->semester_id+5)
            ->get();

        $semester_chosen = Semester::where('id',$semester_id)->first();
        if($semester_chosen->cur_semester == 1){
            $a = 1;
        }
        else
            $a = 0;


        $t12 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '1')->where('teaches.day', '2')->where('semester_id', $semester_id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t13 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '1')->where('teaches.day', '3')->where('semester_id', $semester_id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t14 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '1')->where('teaches.day', '4')->where('semester_id', $semester_id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t15 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '1')->where('teaches.day', '5')->where('semester_id', $semester_id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t16 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '1')->where('teaches.day', '6')->where('semester_id', $semester_id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t17 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '1')->where('teaches.day', '7')->where('semester_id', $semester_id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t22 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '2')->where('teaches.day', '2')->where('semester_id', $semester_id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t23 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '2')->where('teaches.day', '3')->where('semester_id', $semester_id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t24 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '2')->where('teaches.day', '4')->where('semester_id', $semester_id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t25 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '2')->where('teaches.day', '5')->where('semester_id', $semester_id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t26 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '2')->where('teaches.day', '6')->where('semester_id', $semester_id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t27 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '2')->where('teaches.day', '7')->where('semester_id', $semester_id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t32 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '3')->where('teaches.day', '2')->where('semester_id', $semester_id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t33 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '3')->where('teaches.day', '3')->where('semester_id', $semester_id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t34 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '3')->where('teaches.day', '4')->where('semester_id', $semester_id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t35 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '3')->where('teaches.day', '5')->where('semester_id', $semester_id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t36 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '3')->where('teaches.day', '6')->where('semester_id', $semester_id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t37 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '3')->where('teaches.day', '7')->where('semester_id', $semester_id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t42 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '4')->where('teaches.day', '2')->where('semester_id', $semester_id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t43 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '4')->where('teaches.day', '3')->where('semester_id', $semester_id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t44 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '4')->where('teaches.day', '4')->where('semester_id', $semester_id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t45 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '4')->where('teaches.day', '5')->where('semester_id', $semester_id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t46 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '4')->where('teaches.day', '6')->where('semester_id', $semester_id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t47 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '4')->where('teaches.day', '7')->where('semester_id', $semester_id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t52 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '5')->where('teaches.day', '2')->where('semester_id', $semester_id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t53 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '5')->where('teaches.day', '3')->where('semester_id', $semester_id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t54 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '5')->where('teaches.day', '4')->where('semester_id', $semester_id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t55 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '5')->where('teaches.day', '5')->where('semester_id', $semester_id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t56 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '5')->where('teaches.day', '6')->where('semester_id', $semester_id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t57 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '5')->where('teaches.day', '7')->where('semester_id', $semester_id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        return view('dashboard.dashboard-admin.showTimeTable1', ['user' => $user_login, 'admin_info' => $admin_info, 'class' => $class, 'semesters'=>$semesters, 'semester_chosen'=>$semester_chosen, 'a'=>$a,
            't12' => $t12, 't13' => $t13, 't14' => $t14, 't15' => $t15, 't16' => $t16, 't17' => $t17,
            't22' => $t22, 't23' => $t23, 't24' => $t24, 't25' => $t25, 't26' => $t26, 't27' => $t27,
            't32' => $t32, 't33' => $t33, 't34' => $t34, 't35' => $t35, 't36' => $t36, 't37' => $t37,
            't42' => $t42, 't43' => $t43, 't44' => $t44, 't45' => $t45, 't46' => $t46, 't47' => $t47,
            't52' => $t52, 't53' => $t53, 't54' => $t54, 't55' => $t55, 't56' => $t56, 't57' => $t57,]);
    }

    public function editTimeTableForClass($class_name)
    {
        $user_login = Auth::user();
        $user_login_id = $user_login->id;
        $admin_info = Admin::where('user_id', $user_login_id)->first();

        $subject_list = Subject::all();
        $teacher_list = User::join('teachers', 'users.id', '=', 'teachers.user_id')
            ->get(['users.name']);

        $class = CLasss::where('class_name', $class_name)->first();
        $class_id = $class->id;

        $cur_semester = Semester::where('cur_semester', '1')->first();

        $t12 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '1')->where('teaches.day', '2')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t13 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '1')->where('teaches.day', '3')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t14 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '1')->where('teaches.day', '4')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t15 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '1')->where('teaches.day', '5')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t16 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '1')->where('teaches.day', '6')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t17 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '1')->where('teaches.day', '7')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t22 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '2')->where('teaches.day', '2')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t23 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '2')->where('teaches.day', '3')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t24 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '2')->where('teaches.day', '4')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t25 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '2')->where('teaches.day', '5')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t26 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '2')->where('teaches.day', '6')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t27 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '2')->where('teaches.day', '7')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t32 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '3')->where('teaches.day', '2')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t33 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '3')->where('teaches.day', '3')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t34 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '3')->where('teaches.day', '4')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t35 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '3')->where('teaches.day', '5')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t36 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '3')->where('teaches.day', '6')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t37 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '3')->where('teaches.day', '7')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t42 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '4')->where('teaches.day', '2')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t43 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '4')->where('teaches.day', '3')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t44 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '4')->where('teaches.day', '4')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t45 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '4')->where('teaches.day', '5')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t46 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '4')->where('teaches.day', '6')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t47 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '4')->where('teaches.day', '7')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t52 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '5')->where('teaches.day', '2')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t53 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '5')->where('teaches.day', '3')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t54 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '5')->where('teaches.day', '4')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t55 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '5')->where('teaches.day', '5')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t56 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '5')->where('teaches.day', '6')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        $t57 = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('class_id', $class_id)->where('teaches.shift', '5')->where('teaches.day', '7')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id', 'subjects.name as subject_name', 'users.name as teacher_name']);

        return view('dashboard.dashboard-admin.editTimeTable1', ['user' => $user_login, 'admin_info' => $admin_info, 'subjects' => $subject_list, 'teachers' => $teacher_list, 'class' => $class,
            't12' => $t12, 't13' => $t13, 't14' => $t14, 't15' => $t15, 't16' => $t16, 't17' => $t17,
            't22' => $t22, 't23' => $t23, 't24' => $t24, 't25' => $t25, 't26' => $t26, 't27' => $t27,
            't32' => $t32, 't33' => $t33, 't34' => $t34, 't35' => $t35, 't36' => $t36, 't37' => $t37,
            't42' => $t42, 't43' => $t43, 't44' => $t44, 't45' => $t45, 't46' => $t46, 't47' => $t47,
            't52' => $t52, 't53' => $t53, 't54' => $t54, 't55' => $t55, 't56' => $t56, 't57' => $t57,]);
    }

    public function postTimeTableEdit($class_name, Request $request)
    {
        $class = CLasss::where('class_name', $class_name)->first();
        $class_id = $class->id;

        $teacher_id = Teacher::join('users', 'users.id', '=', 'teachers.user_id')
            ->where('users.name', $request->input('teacher'))
            ->first('teachers.id');

        $subject = Subject::where('name', $request->input('subject'))
            ->first();

        $cur_semester = Semester::where('cur_semester', '1')->first();

        $test = Teach::where('day', $request->input('day'))
            ->where('shift', $request->input('shift'))
            ->where('teacher_id', $teacher_id->id)
            ->where('semester_id', $cur_semester->id)
            ->first();
        //dd($test->subject_id);

        if ($test == null){
            $teach = Teach::where('class_id', $class_id)
                ->where('day', $request->input('day'))
                ->where('shift', $request->input('shift'))
                ->first();

            $teach->teacher_id = $teacher_id->id;
            $teach->subject_id = $subject->id;
            $teach->semester_id = $cur_semester->id;
            $teach->save();

            return redirect()->route('editTimeTable', ['class_name' => $class_name]);
        }
        elseif ($test->subject_id == '14'){
            $teach = Teach::where('class_id', $class_id)
                ->where('day', $request->input('day'))
                ->where('shift', $request->input('shift'))
                ->first();
            $teach->teacher_id = '1';
            $teach->subject_id = '14';
            $teach->semester_id = $cur_semester->id;
            $teach->save();
            return redirect()->route('editTimeTable', ['class_name' => $class_name]);
        }
        else {
            return redirect()->route('editTimeTable', ['class_name' => $class_name])->with('alert', 'Giáo viên này đã có lịch dạy lớp khác!');
        }
    }

    public function deleteTimeTableForClass($class_name)
    {
        $class = CLasss::where('class_name', $class_name)->first();
        $class_id = $class->id;

        $teaches = Teach::where('class_id', $class_id)->get();
        $cur_semester = Semester::where('cur_semester', '1')->first();

        foreach ($teaches as $teach) {
            $teach->subject_id = '14';
            $teach->teacher_id = '1';
            $teach->semester_id = $cur_semester->id;
            $teach->save();
        }
        return redirect()->route('editTimeTable', ['class_name' => $class_name])->with('alert', 'Xoá thời khoá biểu thành công!');
    }

    public function createSemester(){
        $user_login = Auth::user();
        $user_login_id = $user_login->id;
        $admin_info = Admin::where('user_id', $user_login_id)->first();

        return view('dashboard.dashboard-admin.createSemester', ['user' => $user_login, 'admin_info' => $admin_info]);
    }

    public function postNewSemester(Request $request){
        $cur_semester = Semester::where('cur_semester', '1')->first();
        $semester = Semester::where('semester_name', $request->input('new_semester'))->first();

        if ($semester != null){
            return redirect(route('createSemester'))->with('alert', 'Trùng tên học kì!');
        }
        else{
            $cur_semester->cur_semester = 0;
            $cur_semester->save();
            Semester::create([
                'semester_name' => $request->input('new_semester'),
                'cur_semester' => '1',
            ]);
            $new_semester = Semester::where('cur_semester', '1')->first();
            $a = intval($new_semester->semester_name)%2;
            if ( $a != 0 ){
                $classes = CLasss::where('class_name','!=','Đã tốt nghiệp')->get();
                foreach ($classes as $class){
                    $class_name = $class->class_name;
                    $grade = preg_replace('/\D/', '', $class_name);
                    if ($grade == '12'){
                        $class->class_name = 'Đã tốt nghiệp';
                        $class->save();
                    }
                    elseif ($grade == '11'){
                        $class->class_name = '12 '.$class->name;
                        $class->save();
                    }
                    elseif ($grade == '10'){
                        $class->class_name = '11 '.$class->name;
                        $class->save();
                    }
                }

                $last = $classes->max('khoa');
                CLasss::create([
                    'name' => 'toán',
                    'khoa' => $last+1,
                    'class_name' => '10 toán',
                    'teacher_id' => '1',
                    'semester_id' => $new_semester->id
                ]);
                CLasss::create([
                    'name' => 'lý',
                    'khoa' => $last+1,
                    'class_name' => '10 lý',
                    'teacher_id' => '1',
                    'semester_id' => $new_semester->id
                ]);
                CLasss::create([
                    'name' => 'hoá',
                    'khoa' => $last+1,
                    'class_name' => '10 hoá',
                    'teacher_id' => '1',
                    'semester_id' => $new_semester->id
                ]);
                CLasss::create([
                    'name' => 'văn',
                    'khoa' => $last+1,
                    'class_name' => '10 văn',
                    'teacher_id' => '1',
                    'semester_id' => $new_semester->id
                ]);
                CLasss::create([
                    'name' => 'anh',
                    'khoa' => $last+1,
                    'class_name' => '10 anh',
                    'teacher_id' => '1',
                    'semester_id' => $new_semester->id
                ]);
                CLasss::create([
                    'name' => 'tin',
                    'khoa' => $last+1,
                    'class_name' => '10 tin',
                    'teacher_id' => '1',
                    'semester_id' => $new_semester->id
                ]);
                CLasss::create([
                    'name' => 'k',
                    'khoa' => $last+1,
                    'class_name' => '10 k',
                    'teacher_id' => '1',
                    'semester_id' => $new_semester->id
                ]);
            }
            $classes1 = CLasss::where('class_name','!=','Đã tốt nghiệp')->get();
            foreach ($classes1 as $class1){
                for ($j=2; $j<=7; $j++) {
                    for ($k=1; $k<=5; $k++) {
                        Teach::create([
                            'day' => $j,
                            'shift' => $k,
                            'teacher_id' => '1',
                            'class_id' => $class1->id,
                            'subject_id' => '14',
                            'semester_id' => $new_semester->id
                        ]);
                    }
                }
            }

            $students = Student::join('classes','classes.id','=','students.class_id')
                ->where('class_name','!=','Đã tốt nghiệp')->get('students.id');
            foreach ($students as $student){
                for ($k=1 ; $k <= 11; $k++){
                    Point::create([
                        'heso1' => '0',
                        'heso2' => '0',
                        'heso3' => '0',
                        'trungbinh' => '0',
                        'student_id' => $student->id,
                        'subject_id' => $k,
                        'semester_id' => $new_semester->id,
                    ]);
                }
            }
            DB::table('users')
                ->join('students','users.id','=','students.user_id')
                ->join('classes','classes.id','=','students.class_id')
                ->where('classes.class_name','=','Đã tốt nghiệp')
                ->update(['trang_thai' => 0]);

            return redirect(route('createHomeRoomTeacher'))->with('alert', 'Tạo học kì mới thành công! Vui lòng chọn GVCN cho các lớp.');
        }
    }

    public function createHomeRoomTeacher(){
        $user_login = Auth::user();
        $user_login_id = $user_login->id;
        $admin_info = Admin::where('user_id', $user_login_id)->first();
        $teacher_list = User::join('teachers', 'users.id', '=', 'teachers.user_id')
            ->get(['users.name']);

        return view('dashboard.dashboard-admin.createGVCN', ['user' => $user_login, 'admin_info' => $admin_info, 'teachers'=>$teacher_list]);
    }

    public function postNewHomeRoomTeacher(Request $request){
        $toan10 = Teacher::join('users', 'users.id', '=', 'teachers.user_id')
            ->where('users.name', $request->input('10toan'))
            ->first('teachers.id');
        $t10 = CLasss::where('class_name', '=','10 toán')->first();
        $t10->teacher_id = $toan10->id;
        $t10->save();

        $ly10 = Teacher::join('users', 'users.id', '=', 'teachers.user_id')
            ->where('users.name', $request->input('10ly'))
            ->first('teachers.id');
        $l10 = CLasss::where('class_name', '=','10 lý')->first();
        $l10->teacher_id = $ly10->id;
        $l10->save();

        $hoa10 = Teacher::join('users', 'users.id', '=', 'teachers.user_id')
            ->where('users.name', $request->input('10hoa'))
            ->first('teachers.id');
        $h10 = CLasss::where('class_name', '=','10 hoá')->first();
        $h10->teacher_id = $hoa10->id;
        $h10->save();

        $van10 = Teacher::join('users', 'users.id', '=', 'teachers.user_id')
            ->where('users.name', $request->input('10van'))
            ->first('teachers.id');
        $v10 = CLasss::where('class_name', '=','10 văn')->first();
        $v10->teacher_id = $van10->id;
        $v10->save();

        $anh10 = Teacher::join('users', 'users.id', '=', 'teachers.user_id')
            ->where('users.name', $request->input('10anh'))
            ->first('teachers.id');
        $a10 = CLasss::where('class_name', '=','10 anh')->first();
        $a10->teacher_id = $anh10->id;
        $a10->save();

        $tin10 = Teacher::join('users', 'users.id', '=', 'teachers.user_id')
            ->where('users.name', $request->input('10tin'))
            ->first('teachers.id');
        $ti10 = CLasss::where('class_name', '=','10 tin')->first();
        $ti10->teacher_id = $tin10->id;
        $ti10->save();

        $k10 = Teacher::join('users', 'users.id', '=', 'teachers.user_id')
            ->where('users.name', $request->input('10k'))
            ->first('teachers.id');
        $ck10 = CLasss::where('class_name', '=','10 k')->first();
        $ck10->teacher_id = $k10->id;
        $ck10->save();

        return redirect(route('createSemester'))->with('alert', 'Chọn GVCN thành công!');
    }
}

