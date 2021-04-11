<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use  SoftDeletes;
    protected $table = 'subjects';

    protected $fillable = [
        'name'
    ];

    public function usesTimestamps() : bool{
        return true;
    }
}
