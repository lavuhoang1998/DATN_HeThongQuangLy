<?php

namespace App\Http\Controllers;

use App\Models\Point;
use App\Models\Semester;
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
        $cur_semester = Semester::where('cur_semester', '1')->first();
        $point_info = Point::where('student_id',$student_id)
            ->where('subject_id',$subject_id)
            ->where('semester_id',$cur_semester->id)
            ->get();
        return $point_info;
    }

    public function showPointTB($student_id)
    {
        $cur_semester = Semester::where('cur_semester', '1')->first();
        $points = Point::join('students', 'points.student_id','=','students.id')
            ->join('subjects', 'points.subject_id','=','subjects.id')
            ->where('points.student_id', $student_id)
            ->where('points.semester_id', $cur_semester->id)
            ->get();

        $trung_binh_mon=[];
        foreach ($points as $point){
            array_push($trung_binh_mon,$point->trungbinh);
        }
        $trungbinh =round(array_sum($trung_binh_mon) / count($trung_binh_mon) , 2) ;
        if ($trungbinh>=8){
            $result= "Giỏi";
        }
        elseif ($trungbinh>=7 && $trungbinh<8){
            $result= "Khá";
        }
        elseif ($trungbinh>=5 && $trungbinh<7){
            $result= "Trung bình";
        }
        else{
            $result= "Chưa xếp loại";
        }
        $data = [];
        array_push($data, $trungbinh);
        array_push($data, $result);

        return $data;
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
