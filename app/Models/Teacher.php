<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use  SoftDeletes,HasFactory;

    protected $table = 'teachers';

    protected $fillable = [
        'MSGV',
        'sex',
        'date_of_birth',
        'dia_chi',
        'sdt',
        'que_quan',
        'dan_toc',
        'ton_giao',
        'avt',
        'user_id',
        'subject_id'
    ];

    public function usesTimestamps() : bool{
        return true;
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function classes()
    {
        return $this->hasMany(CLasss::class);
    }
}
