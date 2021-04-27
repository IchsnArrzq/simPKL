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
        'user_id',
        'periode_id'
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
        return $this->belongsTo(Periode::class);
    }
    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }
    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class);
    }
    public function rapot()
    {
        return $this->hasMany(Rapot::class);
    }
}
