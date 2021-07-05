<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    //
    protected $fillable = [
        'mulai',
        'selesai',
        'tahun_pelajaran',
        'angkatan'
    ];
    public function pembimbing()
    {
        return $this->hasMany(Pembimbing::class);
    }
    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }
    public function perusahaan()
    {
        return $this->hasMany(Perusahaan::class);
    }
}
