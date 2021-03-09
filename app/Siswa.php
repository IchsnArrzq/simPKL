<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = ['nis','nama','ttl','nisn','jurusan','status','user_id'];
    protected $primaryKey = 'user_id';
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
