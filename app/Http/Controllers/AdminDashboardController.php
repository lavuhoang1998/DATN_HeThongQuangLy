<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function showDashboard()
    {
        $user_login = Auth::user();
        return view('dashboard.dashboard-admin.dashboard-admin',['user'=>$user_login]);
    }
}
