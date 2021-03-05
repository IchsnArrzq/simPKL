<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['company', 'start_date', 'finish_date','long_time'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
