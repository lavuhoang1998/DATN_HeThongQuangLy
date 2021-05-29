<?php

namespace App\Http\Controllers;

use App\Models\HomeroomTeacher;
use App\Models\Semester;
use App\Models\Study;
use Illuminate\Http\Request;

class API_HomeRoomTeacherController extends Controller
{
    public function index()
    {
        return HomeroomTeacher::all();
    }

    public function show($id)
    {
        return HomeroomTeacher::find($id);
    }

    public function showHomeroom_teachersByClass($class_id){
        $cur_semester = Semester::where('cur_semester', '1')->first();
        return HomeroomTeacher::where('class_id',$class_id)
            ->where('semester_id',$cur_semester->id )
            ->first();
    }

    public function store(Request $request)
    {
        return HomeroomTeacher::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $homeroom_teacher = HomeroomTeacher::findOrFail($id);
        $homeroom_teacher->update($request->all());

        return $homeroom_teacher;
    }

    public function delete(Request $request, $id)
    {
        $homeroom_teacher = HomeroomTeacher::findOrFail($id);
        $homeroom_teacher->delete();

        return 204;
    }
}
