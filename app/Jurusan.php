<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    //
    protected $fillable = [
        'nama'
    ];
    public function jurnal()
    {
        return $this->hasMany(Jurnal::class);
    }
    public function kakomli()
    {
        return $this->hasMany(Kakomli::class);
    }
    public function pembimbing_sekolah()
    {
        return $this->hasMany(PembimbingSekolah::class);
    }
    public function pembimbing_industri()
    {
        return $this->hasMany(PembimbingIndustri::class);
    }
    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }
}
