<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;

class API_HistoryController extends Controller
{
    public function index()
    {
        return History::all();
    }

    public function show($id)
    {
        return History::find($id);
    }

    public function historiesByDate($class_id,$date){
        $date1 = date("Y-m-d", strtotime($date));

        $history = History::join('teaches','teaches.id','histories.teach_id')
            ->join('subjects','teaches.subject_id','=','subjects.id')
            ->where('histories.date',$date1)
            ->where('teaches.class_id',$class_id)
            ->orderBy('teaches.day', 'ASC')
            ->orderBy('teaches.shift', 'ASC')
            ->get();


        return $history;
    }

    public function store(Request $request)
    {
        return History::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $history = History::findOrFail($id);
        $history->update($request->all());

        return $history;
    }

    public function delete(Request $request, $id)
    {
        $history = History::findOrFail($id);
        $history->delete();

        return 204;
    }
}
