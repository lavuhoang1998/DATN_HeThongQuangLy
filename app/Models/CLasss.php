<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CLasss extends Model
{
    use  SoftDeletes;
    protected $table = 'classes';

    protected $fillable = [
        'class_name',
        'teacher_id'
    ];

    public function usesTimestamps() : bool{
        return true;
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function teachers()
    {
        return $this->belongsTo(Teacher::class);
    }
}
