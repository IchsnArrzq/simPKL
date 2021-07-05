<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'email', 'password', 'role'
    ];

    public function kakomli()
    {
        return $this->hasOne(Kakomli::class);
    }
    public function siswa()
    {
        return $this->hasOne(Siswa::class);
    }
    public function pembimbing_sekolah()
    {
        return $this->hasOne(PembimbingSekolah::class);
    }
    public function pembimbing_industri()
    {
        return $this->hasOne(PembimbingIndustri::class);
    }
}
