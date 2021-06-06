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
        'user_id',
        'class_id',
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
