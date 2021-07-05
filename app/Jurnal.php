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
        'siswa_id'
    ];
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
