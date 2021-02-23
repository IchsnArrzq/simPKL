<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Perusahaan;
use Faker\Generator as Faker;

$factory->define(Perusahaan::class, function (Faker $faker) {
    return [
        'perusahaan' => 'ini perusahaan '.rand(1,10),
        'tanggal_mulai' => date("Y-m-d"),
        "tanggal_selesai" => date("Y-m-d"),
        "lama_waktu" => 2
    ];
});
