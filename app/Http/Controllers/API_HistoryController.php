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

    public function historiesByDate($date){
        $date1 = date_format($date,"Y/m/d");
        $history = History::join('teaches','teaches.id','histories.teach_id')
            ->join('subjects','teaches.subject_id','=','subjects.id')
            ->where('histories.date',$date1)
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
