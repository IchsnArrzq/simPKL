<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembimbing extends Model
{
    //
    protected $fillable = [
        'no_pembimbing',
        'nama',
        'perusahan_id',
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
    public function periode()
    {
        return $this->hasMany(Periode::class);
    }
    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class);
    }
}
