<?php

namespace App\Http\Controllers;

use App\Models\Point;
use Illuminate\Http\Request;

class API_PointController extends Controller
{
    public function index()
    {
        return Point::all();
    }

    public function show($id)
    {
        return Point::find($id);
    }

    public function showBySID($student_id, $subject_id)
    {
        $point_info = Point::where('student_id',$student_id)
            ->where('subject_id',$subject_id)
            ->get();
        return $point_info;
    }

    public function store(Request $request)
    {
        return Point::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $point = Point::findOrFail($id);
        $point->update($request->all());

        return $point;
    }

    public function delete(Request $request, $id)
    {
        $point = Point::findOrFail($id);
        $point->delete();

        return 204;
    }
}
