<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use Illuminate\Http\Request;

class API_SemesterController extends Controller
{
    public function index()
    {
        return Semester::all();
    }

    public function show($id)
    {
        return Semester::find($id);
    }

    public function showCurSemester()
    {
        return Semester::where('cur_semester','=',1)->first();

    }

    public function store(Request $request)
    {
        return Semester::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $semester = Semester::findOrFail($id);
        $semester->update($request->all());

        return $semester;
    }

    public function delete(Request $request, $id)
    {
        $semester = Semester::findOrFail($id);
        $semester->delete();

        return 204;
    }
}
