<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sertifikat extends Model
{
    protected $fillable = ['judul','siswa_id'];
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
