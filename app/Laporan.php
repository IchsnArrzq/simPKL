<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    //
    protected $fillable = ['laporan','siswa_id'];
    public function siswa()
    {
        return $this->belongsTo(Siswa::class,'siswa_id');
    }
}
