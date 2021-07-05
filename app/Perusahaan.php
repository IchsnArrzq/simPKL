<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    //
    protected $fillable = [
        'nama',
        'kota',
        'periode_id'

    ];
    public function periode()
    {
        return $this->belongsTo(Periode::class);
    }
    public function pembimbing_sekolah()
    {
        return $this->hasMany(PembimbingSekolah::class);
    }
    public function pembimbing_industri()
    {
        return $this->hasMany(PembimbingIndustri::class);
    }
}
