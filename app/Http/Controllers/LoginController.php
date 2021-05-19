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
            $trang_thai = Auth::user()->trang_thai;
            if ($trang_thai ==0)
                return redirect('login')->with('alert', 'Tài khoản của bạn đã bị khoá!');
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
                return redirect('login')->with('alert', 'Bạn đã nhập sai tài khoản hoặc mật khẩu. Vui lòng nhập lại!');
            }
        }
        else
        {
            return redirect('login')->with('alert', 'Bạn đã nhập sai tài khoản hoặc mật khẩu. Vui lòng nhập lại!');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
