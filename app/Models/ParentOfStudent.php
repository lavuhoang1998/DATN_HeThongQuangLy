<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ParentOfStudent extends Model
{
    use  SoftDeletes,HasFactory;
    protected $table = 'parents';

    protected $fillable = [
        'father_name',
        'father_phone_number',
        'mother_name',
        'mother_phone_number',
        'student_id',
    ];

    public function usesTimestamps() : bool{
        return true;
    }

    public function students()
    {
        return $this->belongsTo(Student::class);
    }
}
