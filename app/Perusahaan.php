<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    //
    protected $fillable = [
        'perusahaan',
        'kota'
    ];
    public function pembimbing()
    {
        return $this->hasMany(Pembimbing::class);
    }
}
