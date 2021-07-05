<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PembimbingSekolah extends Model
{
    protected $fillable = ['nama','perusahaan_id','jurusan_id', 'user_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }
    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class);
    }
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
}
