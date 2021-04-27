<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = [
        'nis',
        'nisn',
        'nama',
        'ttl',
        'jurusan_id',
        'periode_id',
        'pembimbing_id',
        'kakomli_id',
        'perusahaan_id',
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
    public function pembimbing()
    {
        return $this->belongsTo(Pembimbing::class);
    }
    public function kakomli()
    {
        return $this->belongsTo(Kakomli::class);
    }
    public function periode()
    {
        return $this->belongsTo(Periode ::class);
    }
    public function rapot()
    {
        return $this->hasOne(Rapot::class);
    }
    public function jurnal()
    {
        return $this->hasMany(Jurnal::class);
    }
    public function laporan()
    {
        return $this->hasMany(Laporan::class);
    }
    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class);
    }
}
