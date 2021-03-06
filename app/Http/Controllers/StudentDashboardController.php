<?php

namespace App\Http\Controllers;

use App\Models\Point;
use App\Models\Semester;
use App\Models\Teach;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\CLasss;
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

        $class_info = CLasss::where('id' , $student_info->class_id)->first();

        $teacher_info = Teacher::where('id' , $class_info->teacher_id)->first();
        $teacher_info1 = User::where('id', $teacher_info->user_id)->first();

        return view('dashboard.dashboard-student.home', ['user' => $user_login, 'student_info' => $student_info, 'parent_info' => $parent_info, 'class_info' => $class_info , 'teacher_info1' => $teacher_info1,]);
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
//        $user_login_id = $user_login->id;
//        $student_info = Student::where('user_id', $user_login_id)->first();

        $user_login->sex = $request->input('sex');
        $user_login->dia_chi = $request->input('address');
        $user_login->que_quan = $request->input('que_quan');
        $user_login->dan_toc = $request->input('dan_toc');
        $user_login->ton_giao = $request->input('ton_giao');
        $user_login->sdt = $request->input('phone_number');
        $user_login ->save();
        return redirect('sms_student/editProfile')->with('alert', 'C???p nh???t th??ng tin th??nh c??ng!');
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
        return redirect('sms_student/editParent')->with('alert', 'C???p nh???t th??ng tin th??nh c??ng!');
    }

    public function postEditPassword(Request $request)
    {
        $user_login = Auth::user();
        if ($request->input('new_password')!= $request->input('new_password1')){
            return redirect('sms_student/editPassword')->with('alert', 'C???p nh???t m???t kh???u kh??ng th??nh c??ng. Nh???p l???i m???t kh???u m???i kh??ng tr??ng kh???p!');
        }
        else{
            $user_login->password = Hash::make($request->input('new_password'));
            $user_login->save();
            return redirect('sms_student/editPassword')->with('alert', 'C???p nh???t m???t kh???u th??nh c??ng!');
        }
    }

    public function showClassInfo(){
        $user_login = Auth::user();
        $user_login_id = $user_login->id;
        $student_info = Student::where('user_id', $user_login_id)->first();


        $student_list = User::join('students', 'users.id', '=' , 'students.user_id')
            ->where('students.class_id' , $student_info->class_id)
            ->where('users.trang_thai' , 1)
            ->simplePaginate(15);
            //->get(['users.name','users.email','students.*'])->paginate(15);

        $student_list1 = User::join('students', 'users.id', '=' , 'students.user_id')
            ->where('students.class_id' , $student_info->class_id)
            ->where('users.trang_thai' , 1)
            ->get();
        $si_so = count($student_list1);

        $class_info = CLasss::where('id' , $student_info->class_id)->first();

        $teacher_info = Teacher::where('id' , $class_info->teacher_id)->first();
        $teacher_info1 = User::where('id', $teacher_info->user_id)->first();

        return view('dashboard.dashboard-student.classInfo', ['user' => $user_login, 'student_info' => $student_info, 'students' => $student_list, 'class_info' => $class_info, 'teacher_info' => $teacher_info, 'teacher_info1' => $teacher_info1, 'si_so'=>$si_so ]);
    }

    public function showTimeTable(){
        $user_login = Auth::user();
        $user_login_id = $user_login->id;
        $student_info = Student::where('user_id', $user_login_id)->first();

        $cur_semester = Semester::where('cur_semester', '1')->first();

        $class = CLasss::where('id', $student_info->class_id)->first();
        $class_id = $class->id;

        $t12 = Teach::join('teachers', 'teaches.teacher_id','=','teachers.id')
            ->join('subjects', 'teaches.subject_id','=','subjects.id')
            ->join('users','users.id', '=', 'teachers.user_id' )
            ->where('class_id', $class_id)->where('teaches.shift','1')->where('teaches.day','2')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id','subjects.name as subject_name','users.name as teacher_name']);

        $t13 = Teach::join('teachers', 'teaches.teacher_id','=','teachers.id')
            ->join('subjects', 'teaches.subject_id','=','subjects.id')
            ->join('users','users.id', '=', 'teachers.user_id' )
            ->where('class_id', $class_id)->where('teaches.shift','1')->where('teaches.day','3')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id','subjects.name as subject_name','users.name as teacher_name']);

        $t14 = Teach::join('teachers', 'teaches.teacher_id','=','teachers.id')
            ->join('subjects', 'teaches.subject_id','=','subjects.id')
            ->join('users','users.id', '=', 'teachers.user_id' )
            ->where('class_id', $class_id)->where('teaches.shift','1')->where('teaches.day','4')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id','subjects.name as subject_name','users.name as teacher_name']);

        $t15 = Teach::join('teachers', 'teaches.teacher_id','=','teachers.id')
            ->join('subjects', 'teaches.subject_id','=','subjects.id')
            ->join('users','users.id', '=', 'teachers.user_id' )
            ->where('class_id', $class_id)->where('teaches.shift','1')->where('teaches.day','5')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id','subjects.name as subject_name','users.name as teacher_name']);

        $t16 = Teach::join('teachers', 'teaches.teacher_id','=','teachers.id')
            ->join('subjects', 'teaches.subject_id','=','subjects.id')
            ->join('users','users.id', '=', 'teachers.user_id' )
            ->where('class_id', $class_id)->where('teaches.shift','1')->where('teaches.day','6')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id','subjects.name as subject_name','users.name as teacher_name']);

        $t17 = Teach::join('teachers', 'teaches.teacher_id','=','teachers.id')
            ->join('subjects', 'teaches.subject_id','=','subjects.id')
            ->join('users','users.id', '=', 'teachers.user_id' )
            ->where('class_id', $class_id)->where('teaches.shift','1')->where('teaches.day','7')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id','subjects.name as subject_name','users.name as teacher_name']);

        $t22 = Teach::join('teachers', 'teaches.teacher_id','=','teachers.id')
            ->join('subjects', 'teaches.subject_id','=','subjects.id')
            ->join('users','users.id', '=', 'teachers.user_id' )
            ->where('class_id', $class_id)->where('teaches.shift','2')->where('teaches.day','2')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id','subjects.name as subject_name','users.name as teacher_name']);

        $t23 = Teach::join('teachers', 'teaches.teacher_id','=','teachers.id')
            ->join('subjects', 'teaches.subject_id','=','subjects.id')
            ->join('users','users.id', '=', 'teachers.user_id' )
            ->where('class_id', $class_id)->where('teaches.shift','2')->where('teaches.day','3')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id','subjects.name as subject_name','users.name as teacher_name']);

        $t24 = Teach::join('teachers', 'teaches.teacher_id','=','teachers.id')
            ->join('subjects', 'teaches.subject_id','=','subjects.id')
            ->join('users','users.id', '=', 'teachers.user_id' )
            ->where('class_id', $class_id)->where('teaches.shift','2')->where('teaches.day','4')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id','subjects.name as subject_name','users.name as teacher_name']);

        $t25 = Teach::join('teachers', 'teaches.teacher_id','=','teachers.id')
            ->join('subjects', 'teaches.subject_id','=','subjects.id')
            ->join('users','users.id', '=', 'teachers.user_id' )
            ->where('class_id', $class_id)->where('teaches.shift','2')->where('teaches.day','5')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id','subjects.name as subject_name','users.name as teacher_name']);

        $t26 = Teach::join('teachers', 'teaches.teacher_id','=','teachers.id')
            ->join('subjects', 'teaches.subject_id','=','subjects.id')
            ->join('users','users.id', '=', 'teachers.user_id' )
            ->where('class_id', $class_id)->where('teaches.shift','2')->where('teaches.day','6')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id','subjects.name as subject_name','users.name as teacher_name']);

        $t27 = Teach::join('teachers', 'teaches.teacher_id','=','teachers.id')
            ->join('subjects', 'teaches.subject_id','=','subjects.id')
            ->join('users','users.id', '=', 'teachers.user_id' )
            ->where('class_id', $class_id)->where('teaches.shift','2')->where('teaches.day','7')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id','subjects.name as subject_name','users.name as teacher_name']);

        $t32 = Teach::join('teachers', 'teaches.teacher_id','=','teachers.id')
            ->join('subjects', 'teaches.subject_id','=','subjects.id')
            ->join('users','users.id', '=', 'teachers.user_id' )
            ->where('class_id', $class_id)->where('teaches.shift','3')->where('teaches.day','2')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id','subjects.name as subject_name','users.name as teacher_name']);

        $t33 = Teach::join('teachers', 'teaches.teacher_id','=','teachers.id')
            ->join('subjects', 'teaches.subject_id','=','subjects.id')
            ->join('users','users.id', '=', 'teachers.user_id' )
            ->where('class_id', $class_id)->where('teaches.shift','3')->where('teaches.day','3')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id','subjects.name as subject_name','users.name as teacher_name']);

        $t34 = Teach::join('teachers', 'teaches.teacher_id','=','teachers.id')
            ->join('subjects', 'teaches.subject_id','=','subjects.id')
            ->join('users','users.id', '=', 'teachers.user_id' )
            ->where('class_id', $class_id)->where('teaches.shift','3')->where('teaches.day','4')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id','subjects.name as subject_name','users.name as teacher_name']);

        $t35 = Teach::join('teachers', 'teaches.teacher_id','=','teachers.id')
            ->join('subjects', 'teaches.subject_id','=','subjects.id')
            ->join('users','users.id', '=', 'teachers.user_id' )
            ->where('class_id', $class_id)->where('teaches.shift','3')->where('teaches.day','5')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id','subjects.name as subject_name','users.name as teacher_name']);

        $t36 = Teach::join('teachers', 'teaches.teacher_id','=','teachers.id')
            ->join('subjects', 'teaches.subject_id','=','subjects.id')
            ->join('users','users.id', '=', 'teachers.user_id' )
            ->where('class_id', $class_id)->where('teaches.shift','3')->where('teaches.day','6')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id','subjects.name as subject_name','users.name as teacher_name']);

        $t37 = Teach::join('teachers', 'teaches.teacher_id','=','teachers.id')
            ->join('subjects', 'teaches.subject_id','=','subjects.id')
            ->join('users','users.id', '=', 'teachers.user_id' )
            ->where('class_id', $class_id)->where('teaches.shift','3')->where('teaches.day','7')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id','subjects.name as subject_name','users.name as teacher_name']);

        $t42 = Teach::join('teachers', 'teaches.teacher_id','=','teachers.id')
            ->join('subjects', 'teaches.subject_id','=','subjects.id')
            ->join('users','users.id', '=', 'teachers.user_id' )
            ->where('class_id', $class_id)->where('teaches.shift','4')->where('teaches.day','2')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id','subjects.name as subject_name','users.name as teacher_name']);

        $t43 = Teach::join('teachers', 'teaches.teacher_id','=','teachers.id')
            ->join('subjects', 'teaches.subject_id','=','subjects.id')
            ->join('users','users.id', '=', 'teachers.user_id' )
            ->where('class_id', $class_id)->where('teaches.shift','4')->where('teaches.day','3')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id','subjects.name as subject_name','users.name as teacher_name']);

        $t44 = Teach::join('teachers', 'teaches.teacher_id','=','teachers.id')
            ->join('subjects', 'teaches.subject_id','=','subjects.id')
            ->join('users','users.id', '=', 'teachers.user_id' )
            ->where('class_id', $class_id)->where('teaches.shift','4')->where('teaches.day','4')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id','subjects.name as subject_name','users.name as teacher_name']);

        $t45 = Teach::join('teachers', 'teaches.teacher_id','=','teachers.id')
            ->join('subjects', 'teaches.subject_id','=','subjects.id')
            ->join('users','users.id', '=', 'teachers.user_id' )
            ->where('class_id', $class_id)->where('teaches.shift','4')->where('teaches.day','5')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id','subjects.name as subject_name','users.name as teacher_name']);

        $t46 = Teach::join('teachers', 'teaches.teacher_id','=','teachers.id')
            ->join('subjects', 'teaches.subject_id','=','subjects.id')
            ->join('users','users.id', '=', 'teachers.user_id' )
            ->where('class_id', $class_id)->where('teaches.shift','4')->where('teaches.day','6')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id','subjects.name as subject_name','users.name as teacher_name']);

        $t47 = Teach::join('teachers', 'teaches.teacher_id','=','teachers.id')
            ->join('subjects', 'teaches.subject_id','=','subjects.id')
            ->join('users','users.id', '=', 'teachers.user_id' )
            ->where('class_id', $class_id)->where('teaches.shift','4')->where('teaches.day','7')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id','subjects.name as subject_name','users.name as teacher_name']);

        $t52 = Teach::join('teachers', 'teaches.teacher_id','=','teachers.id')
            ->join('subjects', 'teaches.subject_id','=','subjects.id')
            ->join('users','users.id', '=', 'teachers.user_id' )
            ->where('class_id', $class_id)->where('teaches.shift','5')->where('teaches.day','2')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id','subjects.name as subject_name','users.name as teacher_name']);

        $t53 = Teach::join('teachers', 'teaches.teacher_id','=','teachers.id')
            ->join('subjects', 'teaches.subject_id','=','subjects.id')
            ->join('users','users.id', '=', 'teachers.user_id' )
            ->where('class_id', $class_id)->where('teaches.shift','5')->where('teaches.day','3')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id','subjects.name as subject_name','users.name as teacher_name']);

        $t54 = Teach::join('teachers', 'teaches.teacher_id','=','teachers.id')
            ->join('subjects', 'teaches.subject_id','=','subjects.id')
            ->join('users','users.id', '=', 'teachers.user_id' )
            ->where('class_id', $class_id)->where('teaches.shift','5')->where('teaches.day','4')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id','subjects.name as subject_name','users.name as teacher_name']);

        $t55 = Teach::join('teachers', 'teaches.teacher_id','=','teachers.id')
            ->join('subjects', 'teaches.subject_id','=','subjects.id')
            ->join('users','users.id', '=', 'teachers.user_id' )
            ->where('class_id', $class_id)->where('teaches.shift','5')->where('teaches.day','5')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id','subjects.name as subject_name','users.name as teacher_name']);

        $t56 = Teach::join('teachers', 'teaches.teacher_id','=','teachers.id')
            ->join('subjects', 'teaches.subject_id','=','subjects.id')
            ->join('users','users.id', '=', 'teachers.user_id' )
            ->where('class_id', $class_id)->where('teaches.shift','5')->where('teaches.day','6')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id','subjects.name as subject_name','users.name as teacher_name']);

        $t57 = Teach::join('teachers', 'teaches.teacher_id','=','teachers.id')
            ->join('subjects', 'teaches.subject_id','=','subjects.id')
            ->join('users','users.id', '=', 'teachers.user_id' )
            ->where('class_id', $class_id)->where('teaches.shift','5')->where('teaches.day','7')->where('teaches.semester_id',$cur_semester->id)
            ->first(['teaches.id','subjects.name as subject_name','users.name as teacher_name']);

        return view('dashboard.dashboard-student.showTimeTable', ['user' => $user_login, 'student_info' => $student_info, 'class' =>$class, 'cur_semester' =>$cur_semester,
            't12'=>$t12, 't13'=>$t13, 't14'=>$t14, 't15'=>$t15, 't16'=>$t16, 't17'=>$t17,
            't22'=>$t22, 't23'=>$t23, 't24'=>$t24, 't25'=>$t25, 't26'=>$t26, 't27'=>$t27,
            't32'=>$t32, 't33'=>$t33, 't34'=>$t34, 't35'=>$t35, 't36'=>$t36, 't37'=>$t37,
            't42'=>$t42, 't43'=>$t43, 't44'=>$t44, 't45'=>$t45, 't46'=>$t46, 't47'=>$t47,
            't52'=>$t52, 't53'=>$t53, 't54'=>$t54, 't55'=>$t55, 't56'=>$t56, 't57'=>$t57,]);
    }
    public function showPoint(){
        $user_login = Auth::user();
        $user_login_id = $user_login->id;
        $student_info = Student::where('user_id', $user_login_id)->first();
        $class_info = CLasss::where('id' , $student_info->class_id)->first();

        $semesters = Semester::where('id','>=',$class_info->semester_id)
            ->where('id','<=',$class_info->semester_id+5)
            ->get();

        return view('dashboard.dashboard-student.showPoint', ['user' => $user_login, 'student_info' => $student_info, 'semesters'=>$semesters]);
    }

    public function showPointBySemester($semester_id){
        $user_login = Auth::user();
        $user_login_id = $user_login->id;
        $student_info = Student::where('user_id', $user_login_id)->first();
        $class_info = CLasss::where('id' , $student_info->class_id)->first();
        $semester_chosen = Semester::where('id', $semester_id)->first();

        $semesters = Semester::where('id','>=',$class_info->semester_id)
            ->where('id','<=',$class_info->semester_id+5)
            ->get();


        $points = Point::join('students', 'points.student_id','=','students.id')
            ->join('subjects', 'points.subject_id','=','subjects.id')
            ->where('points.student_id', $student_info->id)
            ->where('points.semester_id', $semester_id)
            ->get();

        $trung_binh_mon=[];
        foreach ($points as $point){
            array_push($trung_binh_mon,$point->trungbinh);
        }
        $trungbinh =round(array_sum($trung_binh_mon) / count($trung_binh_mon) , 2) ;
        if ($trungbinh>=8){
            $result= "Gi???i";
        }
        elseif ($trungbinh>=7 && $trungbinh<8){
            $result= "Kh??";
        }
        elseif ($trungbinh>=5 && $trungbinh<7){
            $result= "Trung b??nh";
        }
        else{
            $result= "Ch??a x???p lo???i";
        }
        return view('dashboard.dashboard-student.showPoint1', ['user' => $user_login, 'student_info' => $student_info, 'points'=>$points, 'tb'=>$trungbinh,'result'=>$result, 'semesters'=>$semesters, 'semester_chosen'=>$semester_chosen]);
    }

}


