<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Semester extends Model
{
    use  SoftDeletes;
    protected $table = 'semesters';

    protected $fillable = [
        'semester_name',
        'cur_semester',
    ];

    public function usesTimestamps() : bool{
        return true;
    }
}
