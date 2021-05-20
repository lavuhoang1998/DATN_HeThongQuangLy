<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CLasss;

class API_ClassController extends Controller
{
    public function index()
    {
        return CLasss::all();
    }

    public function show($id)
    {
        return CLasss::find($id);
    }

    public function store(Request $request)
    {
        return CLasss::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $class = CLasss::findOrFail($id);
        $class->update($request->all());

        return $class;
    }

    public function delete(Request $request, $id)
    {
        $class = CLasss::findOrFail($id);
        $class->delete();

        return 204;
    }
}
