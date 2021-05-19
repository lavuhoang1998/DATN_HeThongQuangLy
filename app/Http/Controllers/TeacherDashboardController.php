<?php

namespace App\Http\Controllers;

use App\Models\CLasss;
use App\Models\History;
use App\Models\Point;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Teach;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $teacher_info->save();
        return redirect('sms_teacher/editProfile')->with('alert', 'Cập nhật thông tin thành công!');
    }

    public function postEditPassword(Request $request)
    {
        $user_login = Auth::user();
        if ($request->input('new_password') != $request->input('new_password1')) {
            return redirect('sms_teacher/editPassword')->with('alert', 'Cập nhật mật khẩu không thành công. Nhập lại mật khẩu mới không trùng khớp!');
        } else {
            $user_login->password = Hash::make($request->input('new_password'));
            $user_login->save();
            return redirect('sms_teacher/editPassword')->with('alert', 'Cập nhật mật khẩu thành công!');
        }
    }

    public function showTimeTable()
    {
        $user_login = Auth::user();
        $user_login_id = $user_login->id;
        $teacher_info = Teacher::where('user_id', $user_login_id)->first();

        $teaches = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->join('classes', 'classes.id', '=', 'teaches.class_id')->where('users.name', $user_login->name)
            ->orderBy('teaches.day', 'ASC')
            ->orderBy('teaches.shift', 'ASC')
            ->get(['teaches.day', 'teaches.shift', 'subjects.name as subject_name', 'classes.class_name as class_name']);

        return view('dashboard.dashboard-teacher.showTimeTable', ['user' => $user_login, 'teacher_info' => $teacher_info, 'teaches' => $teaches]);
    }

    public function showHistory()
    {
        $user_login = Auth::user();
        $user_login_id = $user_login->id;
        $teacher_info = Teacher::where('user_id', $user_login_id)->first();
        $teaches = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->join('classes', 'classes.id', '=', 'teaches.class_id')->where('users.name', $user_login->name)
            ->orderBy('teaches.day', 'ASC')
            ->orderBy('teaches.shift', 'ASC')
            ->get(['teaches.day', 'teaches.shift', 'subjects.name as subject_name', 'classes.class_name as class_name']);
        return view('dashboard.dashboard-teacher.showHistory', ['user' => $user_login, 'teacher_info' => $teacher_info, 'teaches' => $teaches]);
    }

    public function getHistoryByDay(Request $request)
    {
        $user_login = Auth::user();
        $user_login_id = $user_login->id;
        $teacher_info = Teacher::where('user_id', $user_login_id)->first();

        $day = $request->day;
        $today = date("Y/m/d");

        if (strtotime($day) > strtotime($today)){
            $a =1;
        }
        else{
            $a =0;
        }

        $day1 = date("d-m-Y", strtotime($day));
        //Convert the date string into a unix timestamp.
        $unixTimestamp = strtotime($day);
        //Get the day of the week using PHP's date function.
        //$dayOfWeek = date("l", $unixTimestamp);  //return Monday,Tuesday,...
        $day_of_week = 1 + date('N', $unixTimestamp);

        $teaches = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->join('classes', 'classes.id', '=', 'teaches.class_id')
            ->where('users.name', $user_login->name)
            ->where('teaches.day', $day_of_week)
            ->orderBy('teaches.shift', 'ASC')
            ->get(['teaches.id', 'teaches.shift', 'subjects.name as subject_name', 'classes.class_name as class_name']);

        return view('dashboard.dashboard-teacher.showHistory1', ['user' => $user_login, 'teacher_info' => $teacher_info, 'day' => $day_of_week, 'date' => $day, 'date1' => $day1, 'today'=>$today,'a'=>$a, 'teaches' => $teaches]);
    }

    public function showHistoryByDate($date, $shift)
    {
        $user_login = Auth::user();
        $user_login_id = $user_login->id;
        $teacher_info = Teacher::where('user_id', $user_login_id)->first();

        $date1 = date("d-m-Y", strtotime($date));
        //Convert the date string into a unix timestamp.
        $unixTimestamp = strtotime($date);
        //Get the day of the week using PHP's date function.
        //$dayOfWeek = date("l", $unixTimestamp);  //return Monday,Tuesday,...
        $day_of_week = 1 + date('N', $unixTimestamp);

        $teaches = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->join('classes', 'classes.id', '=', 'teaches.class_id')
            ->where('users.name', $user_login->name)
            ->where('teaches.day', $day_of_week)
            ->where('teaches.shift', $shift)
            ->orderBy('teaches.shift', 'ASC')
            ->get(['teaches.id', 'teaches.shift', 'subjects.name as subject_name', 'classes.class_name as class_name']);

        return view('dashboard.dashboard-teacher.showHistory2', ['user' => $user_login, 'teacher_info' => $teacher_info, 'day' => $day_of_week, 'date' => $date, 'date1' => $date1, 'teaches' => $teaches]);
    }

    public function postEditHistory(Request $request)
    {
        $user_login = Auth::user();
        $user_login_id = $user_login->id;
        $history = History::where('teach_id', $request->input('id'))->first(['histories.*']);
        if ($history == null) {
            History::create([
                'date' => $request->input('date'),
                'content' => $request->input('review'),
                'teach_id' => $request->input('id'),
            ]);
        } else {
            $history->date = $request->input('date');
            $history->content = $request->input('review');
            $history->teach_id = $request->input('id');
            $history->save();
        }

        return redirect(route('showAllHistory'))->with('alert', 'Cập nhật lịch sử buổi học thành công!');
    }

    public function showAllHistory()
    {
        $user_login = Auth::user();
        $user_login_id = $user_login->id;
        $teacher_info = Teacher::where('user_id', $user_login_id)->first();

        $history_list = History::join('teaches', 'histories.teach_id', '=', 'teaches.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('classes', 'teaches.class_id', '=', 'classes.id')
            ->where('teaches.teacher_id', $teacher_info->id)
            ->orderBy('histories.id', 'DESC')
            ->get(['histories.*', 'teaches.day', 'teaches.shift', 'classes.class_name as class_name', 'subjects.name as subject_name']);

        return view('dashboard.dashboard-teacher.showAllHistory', ['user' => $user_login, 'teacher_info' => $teacher_info, 'histories' => $history_list]);
    }

    public function deleteHistory($id)
    {
        $history = History::where('id', $id)->first();
        $history->delete();
        $history->save();
        return redirect(route('showAllHistory'))->with('alert', 'Xoá lịch sử buổi học thành công!');
    }

    public function showPointInput()
    {
        $user_login = Auth::user();
        $user_login_id = $user_login->id;
        $teacher_info = Teacher::where('user_id', $user_login_id)->first();

        $teaches = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('classes', 'classes.id', '=', 'teaches.class_id')->where('teachers.id', $teacher_info->id)
            ->distinct()
            ->get(['class_id', 'class_name']);

        return view('dashboard.dashboard-teacher.showPointInput', ['user' => $user_login, 'teacher_info' => $teacher_info, 'teaches' => $teaches]);
    }

    public function showPointInputByClass($class_id)
    {
        $user_login = Auth::user();
        $user_login_id = $user_login->id;
        $teacher_info = Teacher::where('user_id', $user_login_id)->first();
        $subject = Subject::where('id',$teacher_info->subject_id)->first();

        $teaches = Teach::join('teachers', 'teaches.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'teaches.subject_id', '=', 'subjects.id')
            ->join('classes', 'classes.id', '=', 'teaches.class_id')->where('teachers.id', $teacher_info->id)
            ->distinct()
            ->get(['class_id', 'class_name']);

        $class = CLasss::where('id', $class_id)->first();

        $list_student = Point::join('students', 'points.student_id', '=', 'students.id')
            ->join('subjects', 'points.subject_id', '=', 'subjects.id')
            ->join('users', 'students.user_id', '=', 'users.id')
            ->where('points.subject_id', $teacher_info->subject_id)
            ->where('students.class_id', $class_id)
            ->where('users.trang_thai', '1')
            ->get(['users.name', 'students.id as stu_id', 'students.MSHS', 'points.*']);

        return view('dashboard.dashboard-teacher.showPointInput1', ['user' => $user_login, 'teacher_info' => $teacher_info,'subject'=>$subject, 'teaches' => $teaches, 'class' => $class, 'students' => $list_student]);
    }

    public function postPoint($class_id, Request $request)
    {
        $user_login = Auth::user();
        $user_login_id = $user_login->id;
        $teacher_info = Teacher::where('user_id', $user_login_id)->first();

        //Chuyển chuỗi điểm về dạng chuẩn
        preg_match_all('!\d+(?:\.\d+)?!', $request->input('heso1'), $matches1);
        $str_heso1 = implode(", ", $matches1[0]);

        preg_match_all('!\d+(?:\.\d+)?!', $request->input('heso2'), $matches2);
        $str_heso2 = implode(", ", $matches2[0]);

        preg_match_all('!\d+(?:\.\d+)?!', $request->input('heso3'), $matches3);
        $str_heso3 = implode(", ", $matches3[0]);

        $TS = array_sum($matches1[0]) * 1 + array_sum($matches2[0]) * 2 + array_sum($matches3[0]) * 3;
        $MS = count($matches1[0]) * 1 + count($matches2[0]) * 2 + count($matches3[0]) * 3;
        $trungbinh = round($TS / $MS, 2);

        $points = Point::where('student_id', $request->input('id'))
            ->where('subject_id', $teacher_info->subject_id)->first();
        if ($points == null) {
            Point::create([
                'heso1' => $str_heso1,
                'heso2' => $str_heso2,
                'heso3' => $str_heso3,
                'trungbinh' => $trungbinh,
                'student_id' => $request->input('id'),
                'subject_id' => $teacher_info->subject_id,
            ]);
        } else {
            $points->heso1 = $str_heso1;
            $points->heso2 = $str_heso2;
            $points->heso3 = $str_heso3;
            $points->trungbinh = $trungbinh;
            $points->save();
        }

        return redirect(route('showPointInputByClass', ['class_id' => $class_id]));
    }


}
