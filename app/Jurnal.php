<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    //
    protected $fillable = [
        'divisi',
        'tanggal',
        'mulai',
        'selesai',
        'kegiatan',
        'hasil',
        'keterangan',
        'jurusan_id'
    ];
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
}
