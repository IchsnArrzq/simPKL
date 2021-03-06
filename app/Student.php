<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['nis','name','class','rayon','user_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
