<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use App\Models\Study;
use Illuminate\Http\Request;

class API_StudyController extends Controller
{
    public function index()
    {
        return Study::all();
    }

    public function show($id)
    {
        return Study::find($id);
    }

    public function showStudiesByStudent($student_id){
        $cur_semester = Semester::where('cur_semester', '1')->first();
        return Study::where('student_id',$student_id)
            ->where('semester_id',$cur_semester->id )
            ->first();
    }

    public function store(Request $request)
    {
        return Study::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $study = Study::findOrFail($id);
        $study->update($request->all());

        return $study;
    }

    public function delete(Request $request, $id)
    {
        $study = Study::findOrFail($id);
        $study->delete();

        return 204;
    }
}
