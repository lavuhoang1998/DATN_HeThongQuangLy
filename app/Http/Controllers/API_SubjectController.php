<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class API_SubjectController extends Controller
{
    public function index()
    {
        return Subject::all();
    }

    public function show($id)
    {
        return Subject::find($id);
    }

    public function showByName($name)
    {
        $subject_info = Subject::where('name',$name)->get();
        return $subject_info;
    }

    public function store(Request $request)
    {
        return Subject::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $subject = Subject::findOrFail($id);
        $subject->update($request->all());

        return $subject;
    }

    public function delete(Request $request, $id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();

        return 204;
    }
}
