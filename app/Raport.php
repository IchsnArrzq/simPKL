<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Raport extends Model
{
    //
    public function user()
    {
        return $this->belongsTo(Raport::class);
    }
}
