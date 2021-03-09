<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PembimbingPkl extends Model
{
    protected $fillable = ['nppkl','nama','jurusan','user_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
