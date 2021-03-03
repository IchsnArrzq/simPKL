<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Absent;
use Faker\Generator as Faker;

$factory->define(Absent::class, function (Faker $faker) {
    return [
        'date' => date("Y-m-d"),
        'checkIn' => date("h:m:s"),
        'checkOut' => date("h:m:s"),
        'description' => 'ini keterangan',
        'activity' => 'ini kegiatan',
        'student_id' => rand(1,2)
    ];
});
