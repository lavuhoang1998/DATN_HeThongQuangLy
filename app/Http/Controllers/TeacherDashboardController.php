<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherDashboardController extends Controller
{
    public function showDashboard()
    {
        $user_login = Auth::user();
        return view('dashboard.dashboard-teacher.dashboard-teacher',['user'=>$user_login]);
    }
}
