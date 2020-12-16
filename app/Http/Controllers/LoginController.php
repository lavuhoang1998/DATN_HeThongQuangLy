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
            return redirect('sms');
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
