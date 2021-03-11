<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kakomli extends Model
{
    //
    protected $fillable = [
        'no_kakomli',
        'nama',
        'jurusan_id',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
}
