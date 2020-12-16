<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Student extends Model
{
    use  SoftDeletes,HasFactory;

    protected $table = 'students';

    protected $fillable = [
        'MSHS',
        'sex',
        'date_of_birth',
        'que_quan',
        'dan_toc',
        'ton_giao',
        'user_id',
    ];

    public function usesTimestamps() : bool{
        return true;
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function parents()
    {
        return $this->hasOne(ParentOfStudent::class);
    }
}
