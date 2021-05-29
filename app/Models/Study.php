<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Study extends Model
{
    use HasFactory;
    use  SoftDeletes;
    protected $table = 'studies';

    protected $fillable = [
        'student_id',
        'class_id',
        'semester_id',
    ];

    public function usesTimestamps() : bool{
        return true;
    }
}
