<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentDashboardController extends Controller
{
    public function showDashboard()
    {
        $user_login = Auth::user();
        return view('dashboard.dashboard-student.dashboard-student',['user'=>$user_login]);
    }
}
