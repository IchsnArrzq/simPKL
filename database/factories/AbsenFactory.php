<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Absen;
use Faker\Generator as Faker;

$factory->define(Absen::class, function (Faker $faker) {
    return [
        'tanggal' => date("Y-m-d"),
        'datang' => date("h:m:s"),
        'pulang' => date("h:m:s"),
        'keterangan' => 'ini keterangan',
        'kegiatan' => 'ini kegiatan',
        'user_id' => rand(1,10)
    ];
});
