<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentDashboardController extends Controller
{
    public function showDashboard()
    {
//        if (Auth::check()){
//            $user_login = Auth::user();
//            return view('dashboard.dashboard',['user'=>$user_login]);
//        }
//        else{
//            return view('login/login');
//        }
        $user_login = Auth::user();
        return view('dashboard.dashboard',['user'=>$user_login]);
    }
}
