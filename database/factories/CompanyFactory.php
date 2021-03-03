<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'company' => 'ini perusahaan '.rand(1,10),
        'start_date' => date("Y-m-d"),
        "finish_date" => date("Y-m-d"),
        "long_time" => 2
    ];
});
