<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    //
    public function user()
    {
        return $this->hasMany(User::class);
    }
}
