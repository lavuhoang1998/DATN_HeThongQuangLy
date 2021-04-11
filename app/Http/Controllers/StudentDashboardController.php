<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\ParentOfStudent;
use Illuminate\Support\Facades\Hash;

class StudentDashboardController extends Controller
{
    public function showDashboard()
    {
        $user_login = Auth::user();
        $user_login_id = $user_login->id;
        $student_info = Student::where('user_id', $user_login_id)->first();
        $parent_info = ParentOfStudent::where('student_id', $student_info->id)->first();
        //dd($parent_info);
        return view('dashboard.dashboard-student.home', ['user' => $user_login, 'student_info' => $student_info, 'parent_info' => $parent_info]);
    }

    public function showEditProfile()
    {
        $user_login = Auth::user();
        $user_login_id = $user_login->id;
        $student_info = Student::where('user_id', $user_login_id)->first();
        return view('dashboard.dashboard-student.editProfile', ['user' => $user_login, 'student_info' => $student_info,]);
    }

    public function showEditParent()
    {
        $user_login = Auth::user();
        $user_login_id = $user_login->id;
        $student_info = Student::where('user_id', $user_login_id)->first();
        $parent_info = ParentOfStudent::where('student_id', $student_info->id)->first();
        return view('dashboard.dashboard-student.editParent', ['user' => $user_login, 'student_info' => $student_info, 'parent_info' => $parent_info]);
    }

    public function showEditPassword()
    {
        $user_login = Auth::user();
        $user_login_id = $user_login->id;
        $student_info = Student::where('user_id', $user_login_id)->first();
        return view('dashboard.dashboard-student.editPassword', ['user' => $user_login, 'student_info' => $student_info,]);
    }

    public function postEditProfile(Request $request)
    {
        $user_login = Auth::user();
        $user_login_id = $user_login->id;
        $student_info = Student::where('user_id', $user_login_id)->first();

        $student_info->sex = $request->input('sex');
        $student_info->dia_chi = $request->input('address');
        $student_info->que_quan = $request->input('que_quan');
        $student_info->dan_toc = $request->input('dan_toc');
        $student_info->ton_giao = $request->input('ton_giao');
        $student_info->sdt = $request->input('phone_number');
        $student_info ->save();
        return redirect('sms_student/editProfile');
    }

    public function postEditParent(Request $request)
    {
        $user_login = Auth::user();
        $user_login_id = $user_login->id;
        $student_info = Student::where('user_id', $user_login_id)->first();
        $parent_info = ParentOfStudent::where('student_id', $student_info->id)->first();

        $parent_info->father_name = $request->input('father_name');
        $parent_info->father_phone_number = $request->input('father_phone_number');
        $parent_info->mother_name = $request->input('mother_name');
        $parent_info->mother_phone_number = $request->input('mother_phone_number');

        $parent_info ->save();
        return redirect('sms_student/editParent');
    }

    public function postEditPassword(Request $request)
    {
        $user_login = Auth::user();
        $user_login->password = Hash::make($request->input('new_password'));
        $user_login ->save();
        return redirect('sms_student/editPassword');
    }
}


