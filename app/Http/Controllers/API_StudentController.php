<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class API_StudentController extends Controller
{
    public function index()
    {
        return Student::all();
    }

    public function show($id)
    {
        return Student::find($id);
    }
    public function showByMSHS($MSHS)
    {
        $student_info = Student::where('MSHS',$MSHS)->get(['id','MSHS','sex','date_of_birth','sdt','user_id','class_id']);
            return $student_info;
    }

    public function store(Request $request)
    {
        return Student::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->update($request->all());

        return $student;
    }

    public function delete(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return 204;
    }
}
