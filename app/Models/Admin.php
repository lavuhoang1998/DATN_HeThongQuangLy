<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model
{
    use  SoftDeletes,HasFactory;
    protected $table = 'admins';

    protected $fillable = [
        'MSAdmin',
        'user_id',
    ];

    public function usesTimestamps() : bool{
        return true;
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
