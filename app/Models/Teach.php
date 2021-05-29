<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teach extends Model
{
    use  SoftDeletes,HasFactory;
    protected $table = 'teaches';

    protected $fillable = [
        'day',
        'shift',
        'teacher_id',
        'class_id',
        'subject_id',
        'semester_id',
    ];

    public function usesTimestamps() : bool{
        return true;
    }

    public function classes()
    {
        return $this->belongsTo(CLasss::class);
    }

    public function teachers()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function subjects()
    {
        return $this->belongsTo(Subject::class);
    }
}
