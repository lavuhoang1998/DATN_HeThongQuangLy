<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Point extends Model
{
    use  SoftDeletes,HasFactory;
    protected $table = 'points';

    protected $fillable = [
        'heso1',
        'heso2',
        'heso3',
        'trungbinh',
        'student_id',
        'subject_id',
    ];

    public function usesTimestamps() : bool{
        return true;
    }
}
