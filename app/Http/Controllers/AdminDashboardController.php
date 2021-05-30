<?php

namespace App\Http\Controllers;

use App\Models\CLasss;
use App\Models\HomeroomTeacher;
use App\Models\ParentOfStudent;
use App\Models\Admin;
use App\Models\Point;
use App\Models\Semester;
use App\Models\Student;
use App\Models\Study;
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
        //dd($admin_info);
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
                'semester_id' => $cur_semester->id,
            ]);
            $students = Student::where('user_id', $last_id)->first();
            ParentOfStudent::create([
                'father_name' => ' ',
                'father_phone_number' => ' ',
                'mother_name' => ' ',
                'mother_phone_number' => ' ',
                'student_id' => $students->id,
            ]);
            Study::create([
                'student_id' => $students->id,
                'semester_id' => $cur_semester->id,
                'class_id' => '1',
            ]);
            for ($i = 1; $i <= 11; $i++) {
                Point::create([
                    'heso1' => ' ',
                    'heso2' => ' ',
                    'heso3' => ' ',
                    'trungbinh' => ' ',
                    'student_id' => $students->id,
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

        $cur_semester = Semester::where('cur_semester', '1')->first();
        $study_id = Study::where('semester_id', $cur_semester->id)
            ->where('student_id', $student_info1->id)
            ->first();

        $class_id = $study_id->class_id;
        $class_info = CLasss::where('id', $class_id)->first();

        $gvcn = HomeroomTeacher::where('class_id', $class_info->id)
            ->where('semester_id', $cur_semester->id)
            ->first();
        $khoa= floor(($student_info1->semester_id -1)/2) + 1;
        $teacher_info = Teacher::where('id', $gvcn->teacher_id)->first();
        $teacher_info1 = User::where('id', $teacher_info->user_id)->first();
        return view('dashboard.dashboard-admin.studentProfile', ['user' => $user_login, 'admin_info' => $admin_info, 'student_info' => $student_info, 'student_info1' => $student_info1, 'student_info2' => $student_info2, 'class_info' => $class_info, 'teacher_info1' => $teacher_info1, 'khoa' => $khoa]);
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
        $user->save();

        $student->MSHS = $request->input('MSHS');
        $student->avt = $request->input('avt');
        $student->date_of_birth = $request->input('DoB');

        $class_name = $request->input('class_name');
        $class_id = CLasss::where('class_name', $class_name)->first()->id;

        $study = Study::where('class_id', $class_id)
            ->where('semester_id', $cur_semester->id)
            ->where('student_id', $student->id)
            ->first();
        $study->class_id = $class_id;

        $student->save();
        $study->save();
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


        $subject = Subject::where('id', $teacher_info1->subject_id)->first();
        $gvcns = HomeroomTeacher::join('semesters','semesters.id','=','homeroom_teachers.semester_id')
            ->join('classes','classes.id','=','homeroom_teachers.class_id')
            ->where('teacher_id', $teacher_info1->id)->get();

        return view('dashboard.dashboard-admin.teacherProfile', ['user' => $user_login, 'admin_info' => $admin_info, 'teacher_info' => $teacher_info, 'teacher_info1' => $teacher_info1, 'subject'=>$subject, 'gvcns'=>$gvcns]);
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

    public function showTimeTableByClass($class_id)
    {
        $user_login = Auth::user();
        $user_login_id = $user_login->id;
        $admin_info = Admin::where('user_id', $user_login_id)->first();

        $semesters = Semester::get();
        $class = CLasss::where('id',$class_id)->first();

        return view('dashboard.dashboard-admin.showTimeTable2', ['user' => $user_login, 'admin_info' => $admin_info, 'semesters'=>$semesters, 'class'=>$class]);
    }



    public function showTimeTableBySemester($class_id, $semester_id)
    {
        $user_login = Auth::user();
        $user_login_id = $user_login->id;
        $admin_info = Admin::where('user_id', $user_login_id)->first();

        $class = CLasss::where('id', $class_id)->first();
        $semesters = Semester::get();
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

    public function editTimeTableForClass($class_id)
    {
        $user_login = Auth::user();
        $user_login_id = $user_login->id;
        $admin_info = Admin::where('user_id', $user_login_id)->first();

        $subject_list = Subject::all();
        $teacher_list = User::join('teachers', 'users.id', '=', 'teachers.user_id')
            ->get(['users.name']);
        $class = CLasss::where('id', $class_id)->first();

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

    public function postTimeTableEdit($class_id, Request $request)
    {
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

            return redirect()->route('editTimeTable', ['class_id' => $class_id]);
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
            return redirect()->route('editTimeTable', ['class_id' => $class_id]);
        }
        else {
            return redirect()->route('editTimeTable', ['class_id' => $class_id])->with('alert', 'Giáo viên này đã có lịch dạy lớp khác!');
        }
    }

    public function deleteTimeTableForClass($class_id)
    {
        $teaches = Teach::where('class_id', $class_id)->get();
        $cur_semester = Semester::where('cur_semester', '1')->first();

        foreach ($teaches as $teach) {
            $teach->subject_id = '14';
            $teach->teacher_id = '1';
            $teach->semester_id = $cur_semester->id;
            $teach->save();
        }
        return redirect()->route('editTimeTable', ['class_id' => $class_id])->with('alert', 'Xoá thời khoá biểu thành công!');
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
                $overs = Study::where('semester_id', $new_semester->id-1)
                    ->where('class_id','>',14)
                    ->where('class_id','<',22)
                    ->get();
                foreach ($overs as $over)
                {
                    Study::create([
                        'student_id' => $over->student_id,
                        'class_id' => '22',
                        'semester_id' => $new_semester->id
                    ]);
                }

                $old_studies = Study::where('semester_id', $new_semester->id-1)
                    ->where('class_id','<',15)
                    ->get();
                foreach ($old_studies as $old_study)
                {
                    Study::create([
                        'student_id' => $old_study->student_id,
                        'class_id' => $old_study->class_id + 7,
                        'semester_id' => $new_semester->id
                    ]);
                }
            }
            else {
                $old_studies = Study::where('semester_id', $new_semester->id-1)
                    ->get();
                foreach ($old_studies as $old_study)
                {
                    Study::create([
                        'student_id' => $old_study->student_id,
                        'class_id' => $old_study->class_id,
                        'semester_id' => $new_semester->id
                    ]);
                }
            }

            for ($i=1; $i<=21; $i++) {
                for ($j=2; $j<=7; $j++) {
                    for ($k=1; $k<=5; $k++) {
                        Teach::create([
                            'day' => $j,
                            'shift' => $k,
                            'teacher_id' => '1',
                            'class_id' => $i,
                            'subject_id' => '14',
                            'semester_id' => $new_semester->id
                        ]);
                    }
                }
            }
            $students = Study::where('semester_id', $new_semester->id)
                ->where('class_id','<',22)
                ->get();
            foreach ($students as $student)
                for ($k=1 ; $k <= 11; $k++){
                    Point::create([
                        'heso1' => '0',
                        'heso2' => '0',
                        'heso3' => '0',
                        'trungbinh' => '0',
                        'student_id' => $student->student_id,
                        'subject_id' => $k,
                        'semester_id' => $new_semester->id,
                    ]);
                }

            DB::table('users')
                ->join('students','users.id','=','students.user_id')
                ->join('studies','studies.student_id','=','students.id')
                ->where('studies.semester_id','=',$new_semester->id)
                ->where('studies.class_id','=',22)
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
        //dd($admin_info);
        return view('dashboard.dashboard-admin.createGVCN', ['user' => $user_login, 'admin_info' => $admin_info, 'teachers'=>$teacher_list]);
    }

    public function postNewHomeRoomTeacher(Request $request){
        $new_semester = Semester::where('cur_semester', '1')->first();
        $toan10 = Teacher::join('users', 'users.id', '=', 'teachers.user_id')
            ->where('users.name', $request->input('10toan'))
            ->first('teachers.id');
        HomeroomTeacher::create([
            'class_id' => 1,
            'teacher_id' => $toan10->id,
            'semester_id' => $new_semester->id,
        ]);

        $ly10 = Teacher::join('users', 'users.id', '=', 'teachers.user_id')
            ->where('users.name', $request->input('10ly'))
            ->first('teachers.id');
        HomeroomTeacher::create([
            'class_id' => 2,
            'teacher_id' => $ly10->id,
            'semester_id' => $new_semester->id,
        ]);

        $hoa10 = Teacher::join('users', 'users.id', '=', 'teachers.user_id')
            ->where('users.name', $request->input('10hoa'))
            ->first('teachers.id');
        HomeroomTeacher::create([
            'class_id' => 3,
            'teacher_id' => $hoa10->id,
            'semester_id' => $new_semester->id,
        ]);

        $van10 = Teacher::join('users', 'users.id', '=', 'teachers.user_id')
            ->where('users.name', $request->input('10van'))
            ->first('teachers.id');
        HomeroomTeacher::create([
            'class_id' => 4,
            'teacher_id' => $van10->id,
            'semester_id' => $new_semester->id,
        ]);

        $anh10 = Teacher::join('users', 'users.id', '=', 'teachers.user_id')
            ->where('users.name', $request->input('10anh'))
            ->first('teachers.id');
        HomeroomTeacher::create([
            'class_id' => 5,
            'teacher_id' => $anh10->id,
            'semester_id' => $new_semester->id,
        ]);

        $tin10 = Teacher::join('users', 'users.id', '=', 'teachers.user_id')
            ->where('users.name', $request->input('10tin'))
            ->first('teachers.id');
        HomeroomTeacher::create([
            'class_id' => 6,
            'teacher_id' => $tin10->id,
            'semester_id' => $new_semester->id,
        ]);

        $k10 = Teacher::join('users', 'users.id', '=', 'teachers.user_id')
            ->where('users.name', $request->input('10k'))
            ->first('teachers.id');
        HomeroomTeacher::create([
            'class_id' => 7,
            'teacher_id' => $k10->id,
            'semester_id' => $new_semester->id,
        ]);

        $toan11 = Teacher::join('users', 'users.id', '=', 'teachers.user_id')
            ->where('users.name', $request->input('11toan'))
            ->first('teachers.id');
        HomeroomTeacher::create([
            'class_id' => 8,
            'teacher_id' => $toan11->id,
            'semester_id' => $new_semester->id,
        ]);

        $ly11 = Teacher::join('users', 'users.id', '=', 'teachers.user_id')
            ->where('users.name', $request->input('11ly'))
            ->first('teachers.id');
        HomeroomTeacher::create([
            'class_id' => 9,
            'teacher_id' => $ly11->id,
            'semester_id' => $new_semester->id,
        ]);

        $hoa11 = Teacher::join('users', 'users.id', '=', 'teachers.user_id')
            ->where('users.name', $request->input('11hoa'))
            ->first('teachers.id');
        HomeroomTeacher::create([
            'class_id' => 10,
            'teacher_id' => $hoa11->id,
            'semester_id' => $new_semester->id,
        ]);

        $van11 = Teacher::join('users', 'users.id', '=', 'teachers.user_id')
            ->where('users.name', $request->input('11van'))
            ->first('teachers.id');
        HomeroomTeacher::create([
            'class_id' => 11,
            'teacher_id' => $van11->id,
            'semester_id' => $new_semester->id,
        ]);

        $anh11 = Teacher::join('users', 'users.id', '=', 'teachers.user_id')
            ->where('users.name', $request->input('11anh'))
            ->first('teachers.id');
        HomeroomTeacher::create([
            'class_id' => 12,
            'teacher_id' => $anh11->id,
            'semester_id' => $new_semester->id,
        ]);

        $tin11 = Teacher::join('users', 'users.id', '=', 'teachers.user_id')
            ->where('users.name', $request->input('11tin'))
            ->first('teachers.id');
        HomeroomTeacher::create([
            'class_id' => 13,
            'teacher_id' => $tin11->id,
            'semester_id' => $new_semester->id,
        ]);

        $k11 = Teacher::join('users', 'users.id', '=', 'teachers.user_id')
            ->where('users.name', $request->input('11k'))
            ->first('teachers.id');
        HomeroomTeacher::create([
            'class_id' => 14,
            'teacher_id' => $k11->id,
            'semester_id' => $new_semester->id,
        ]);

        $toan12 = Teacher::join('users', 'users.id', '=', 'teachers.user_id')
            ->where('users.name', $request->input('12toan'))
            ->first('teachers.id');
        HomeroomTeacher::create([
            'class_id' => 15,
            'teacher_id' => $toan12->id,
            'semester_id' => $new_semester->id,
        ]);

        $ly12 = Teacher::join('users', 'users.id', '=', 'teachers.user_id')
            ->where('users.name', $request->input('12ly'))
            ->first('teachers.id');
        HomeroomTeacher::create([
            'class_id' => 16,
            'teacher_id' => $ly12->id,
            'semester_id' => $new_semester->id,
        ]);

        $hoa12 = Teacher::join('users', 'users.id', '=', 'teachers.user_id')
            ->where('users.name', $request->input('12hoa'))
            ->first('teachers.id');
        HomeroomTeacher::create([
            'class_id' => 17,
            'teacher_id' => $hoa12->id,
            'semester_id' => $new_semester->id,
        ]);

        $van12 = Teacher::join('users', 'users.id', '=', 'teachers.user_id')
            ->where('users.name', $request->input('12van'))
            ->first('teachers.id');
        HomeroomTeacher::create([
            'class_id' => 18,
            'teacher_id' => $van12->id,
            'semester_id' => $new_semester->id,
        ]);

        $anh12 = Teacher::join('users', 'users.id', '=', 'teachers.user_id')
            ->where('users.name', $request->input('12anh'))
            ->first('teachers.id');
        HomeroomTeacher::create([
            'class_id' => 19,
            'teacher_id' => $anh12->id,
            'semester_id' => $new_semester->id,
        ]);

        $tin12 = Teacher::join('users', 'users.id', '=', 'teachers.user_id')
            ->where('users.name', $request->input('12tin'))
            ->first('teachers.id');
        HomeroomTeacher::create([
            'class_id' => 20,
            'teacher_id' => $tin12->id,
            'semester_id' => $new_semester->id,
        ]);

        $k12 = Teacher::join('users', 'users.id', '=', 'teachers.user_id')
            ->where('users.name', $request->input('12k'))
            ->first('teachers.id');
        HomeroomTeacher::create([
            'class_id' => 21,
            'teacher_id' => $k12->id,
            'semester_id' => $new_semester->id,
        ]);

        HomeroomTeacher::create([
            'class_id' => 22,
            'teacher_id' => 1,
            'semester_id' => $new_semester->id,
        ]);

        return redirect(route('createHomeRoomTeacher'))->with('alert', 'Chọn GVCN thành công!');
    }
}

