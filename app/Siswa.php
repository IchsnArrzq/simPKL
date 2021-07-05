<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = [
        'nis',
        'nama',
        'tingkat',
        'jurusan_id',
        'pembimbing_industri_id',
        'pembimbing_sekolah_id',
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
    public function pembimbing_sekolah()
    {
        return $this->belongsTo(PembimbingSekolah::class);
    }
    public function pembimbing_industri()
    {
        return $this->belongsTo(PembimbingIndustri::class);
    }
    public function jurnal()
    {
        return $this->hasMany(Jurnal::class);
    }
    public function rapot()
    {
        return $this->hasOne(Rapot::class);
    }
    public function sertifikat()
    {
        return $this->hasOne(Sertifikat::class);
    }
}
