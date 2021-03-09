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
        'name', 'email', 'password', 'role', 'company_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function absent()
    {
        return $this->hasMany(Absent::class);
    }
    public function raport()
    {
        return $this->hasMany(Raport::class);
    }
    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }
    public function ketua_kompetensi_keahlian()
    {
        return $this->hasMany(KetuaKompetensiKeahlian::class);
    }
    public function pembimbing_pkl()
    {
        return $this->hasMany(PembimbingPkl::class);
    }
}
