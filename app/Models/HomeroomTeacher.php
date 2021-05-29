<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomeroomTeacher extends Model
{
    use  SoftDeletes;
    protected $table = 'homeroom_teachers';

    protected $fillable = [
        'class_id',
        'teacher_id',
        'semester_id',
    ];

    public function usesTimestamps() : bool{
        return true;
    }
}
