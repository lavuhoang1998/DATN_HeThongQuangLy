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
        'name',
        'khoa',
        'class_name',
        'teacher_id',
        'semester_id',
    ];

    public function usesTimestamps() : bool{
        return true;
    }
}
