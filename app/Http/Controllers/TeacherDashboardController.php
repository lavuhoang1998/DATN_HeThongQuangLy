<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TeacherDashboardController extends Controller
{
    public function showDashboard()
    {
        $user_login = Auth::user();
        $user_login_id = $user_login->id;
        $teacher_info = Teacher::where('user_id', $user_login_id)->first();
        //dd($parent_info);
        return view('dashboard.dashboard-teacher.home', ['user' => $user_login, 'teacher_info' => $teacher_info]);
    }

    public function showEditProfile()
    {
        $user_login = Auth::user();
        $user_login_id = $user_login->id;
        $teacher_info = Teacher::where('user_id', $user_login_id)->first();
        return view('dashboard.dashboard-teacher.editProfile', ['user' => $user_login, 'teacher_info' => $teacher_info,]);
    }

    public function showEditPassword()
    {
        $user_login = Auth::user();
        $user_login_id = $user_login->id;
        $teacher_info = Teacher::where('user_id', $user_login_id)->first();
        return view('dashboard.dashboard-teacher.editPassword', ['user' => $user_login, 'teacher_info' => $teacher_info,]);
    }

    public function postEditProfile(Request $request)
    {
        $user_login = Auth::user();
        $user_login_id = $user_login->id;
        $teacher_info = Teacher::where('user_id', $user_login_id)->first();

        $teacher_info->sex = $request->input('sex');
        $teacher_info->dia_chi = $request->input('address');
        $teacher_info->que_quan = $request->input('que_quan');
        $teacher_info->dan_toc = $request->input('dan_toc');
        $teacher_info->ton_giao = $request->input('ton_giao');
        $teacher_info->sdt = $request->input('phone_number');
        $teacher_info ->save();
        return redirect('sms_teacher/editProfile');
    }

    public function postEditPassword(Request $request)
    {
        $user_login = Auth::user();
        $user_login->password = Hash::make($request->input('new_password'));
        $user_login ->save();
        return redirect('sms_teacher/editPassword');
    }
}
