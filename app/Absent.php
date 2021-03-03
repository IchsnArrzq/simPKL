<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absent extends Model
{
    //
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
