<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    //
    protected $fillable = [
        'mulai',
        'selesai',
        'lama_waktu',
        'status'
    ];
    public function pembimbing()
    {
        return $this->hasMany(Pembimbing::class);
    }
    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }
}
