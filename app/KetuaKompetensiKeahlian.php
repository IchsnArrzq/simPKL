<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KetuaKompetensiKeahlian extends Model
{
    protected $fillable = ['nkkk','nama','jurusan','user_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
