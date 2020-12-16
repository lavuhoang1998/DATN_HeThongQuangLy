<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginPage()
    {
            return view('login.login');
    }

    public function postLogin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        //echo "$email, $password";

        if (Auth::attempt(['email'=>$email, 'password'=>$password]))
        {
            $role = Auth::user()->role_id;
            if ($role == 1){
                return redirect('sms_admin');
            }
            else if ($role == 2){
                return redirect('sms_teacher');
            }
            else if ($role == 3){
                return redirect('sms_student');
            }
            else
            {
                return redirect('login');
            }
        }
        else
        {
            return redirect('login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
