<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class History extends Model
{
    use  SoftDeletes,HasFactory;
    protected $table = 'histories';

    protected $fillable = [
        'date',
        'content',
        'teach_id',
    ];

    public function usesTimestamps() : bool{
        return true;
    }

}
