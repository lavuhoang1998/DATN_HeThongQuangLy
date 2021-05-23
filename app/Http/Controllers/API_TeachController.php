<?php

namespace App\Http\Controllers;

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
        $teach_info = Teach::where('class_id',$id)->get();
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
