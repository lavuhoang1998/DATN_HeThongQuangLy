<?php

namespace App\Http\Controllers;

use App\Models\CLasss;
use App\Models\ParentOfStudent;
use App\Models\Admin;
use App\Models\Student;
use App\Models\Subject;
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
        return redirect('sms_admin/editProfile');
    }

    public function postEditPassword(Request $request)
    {
        $user_login = Auth::user();
        $user_login->password = Hash::make($request->input('new_password'));
        $user_login->save();
        return redirect('sms_admin/editPassword');
    }

    public function showStudentManage()
    {
        $user_login = Auth::user();
        $user_login_id = $user_login->id;
        $admin_info = Admin::where('user_id', $user_login_id)->first();
        $students = User::where('role_id', 3)->orderByDesc('id')->get();
        //dd($students);
        return view('dashboard.dashboard-admin.studentManage', ['user' => $user_login, 'admin_info' => $admin_info, 'students' => $students]);
    }

    public function postAddStudent(Request $request)
    {
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
            'MSHS' => 'null',
            'sex' => 'null',
            'date_of_birth' => '2020-12-12',
            'dia_chi' => 'null',
            'sdt' => 'null',
            'que_quan' => 'null',
            'dan_toc' => 'null',
            'ton_giao' => 'null',
            'avt' => 'null',
            'user_id' => $last_id,
            'class_id' => '1',
        ]);
        $students = Student::where('user_id', $last_id)->first();
        ParentOfStudent::create([
            'father_name' => 'null',
            'father_phone_number' => 'null',
            'mother_name' => 'null',
            'mother_phone_number' => 'null',
            'student_id' => $students->id,
        ]);
        return redirect()->route('studentEdit', ['user_id' => $last_id]);
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
        $class_info = CLasss::where('id' , $class_id)->first();
        $teacher_info = Teacher::where('id' , $class_info->teacher_id)->first();
        $teacher_info1 = User::where('id', $teacher_info->user_id)->first();
        return view('dashboard.dashboard-admin.studentProfile', ['user' => $user_login, 'admin_info' => $admin_info, 'student_info' => $student_info, 'student_info1' => $student_info1, 'student_info2' => $student_info2, 'class_info' => $class_info , 'teacher_info1' => $teacher_info1]);
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
        return redirect()->route('studentEdit', ['user_id' => $user_id]);
    }

    public function deleteStudent($user_id)
    {
        $user = User::where('id', $user_id)->first();
        $user->trang_thai = 0;
        $user->save();
        $user->delete();
        return redirect()->route('studentManager');
    }

    public function showTeacherManage()
    {
        $user_login = Auth::user();
        $user_login_id = $user_login->id;
        $admin_info = Admin::where('user_id', $user_login_id)->first();
        $teachers = User::where('role_id', 2)->orderByDesc('id')->get();
        return view('dashboard.dashboard-admin.teacherManage', ['user' => $user_login, 'admin_info' => $admin_info, 'teachers' => $teachers]);
    }

    public function postAddTeacher(Request $request)
    {
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
            'MSGV' => 'null',
            'sex' => 'null',
            'date_of_birth' => '2020-12-12',
            'dia_chi' => 'null',
            'sdt' => 'null',
            'que_quan' => 'null',
            'dan_toc' => 'null',
            'ton_giao' => 'null',
            'avt' => 'null',
            'user_id' => $last_id,
            'subject_id' => '16',
        ]);
        return redirect()->route('teacherEdit', ['user_id' => $last_id]);
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
        return redirect()->route('teacherEdit', ['user_id' => $user_id]);
    }

    public function deleteTeacher($user_id)
    {
        $user = User::where('id', $user_id)->first();
        $user->trang_thai = 0;
        $user->save();
        $user->delete();
        return redirect()->route('teacherManager');
    }
}
