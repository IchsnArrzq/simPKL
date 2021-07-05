<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rapot extends Model
{
    //
    protected $fillable = [
        'kedisiplinan',
        'kompetensi',
        'sikap',
        'siswa_id'
    ];
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
