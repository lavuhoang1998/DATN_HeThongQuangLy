<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use App\Models\Teach;
use Illuminate\Http\Request;

class API_TeachController extends Controller
{
    public function index()
    {
        return Teach::all();
    }

    public function show($id)
    {
        return Teach::find($id);
    }

    public function showByClassID($id)
    {
        $cur_semester = Semester::where('cur_semester', '1')->first();
        $teach_info = Teach::join('subjects','teaches.subject_id','=','subjects.id')
            ->where('class_id',$id)
            ->where('semester_id',$cur_semester->id)
            ->orderBy('teaches.day', 'ASC')
            ->orderBy('teaches.shift', 'ASC')
            ->get();
        return $teach_info;
    }

    public function store(Request $request)
    {
        return Teach::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $teach = Teach::findOrFail($id);
        $teach->update($request->all());

        return $teach;
    }

    public function delete(Request $request, $id)
    {
        $teach = Teach::findOrFail($id);
        $teach->delete();

        return 204;
    }
}
