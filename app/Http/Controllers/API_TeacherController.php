<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class API_TeacherController extends Controller
{
    public function index()
    {
        return Teacher::all();
    }

    public function show($id)
    {
        return Teacher::find($id);
    }

    public function store(Request $request)
    {
        return Teacher::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->update($request->all());

        return $teacher;
    }

    public function delete(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();

        return 204;
    }
}
