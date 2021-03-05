<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'company' => 'ini perusahaan '.rand(1,10),
        'start_date' => Carbon::now(),
        "finish_date" => Carbon::now(),
        "long_time" => date('Y-m-d H:m:s')
    ];
});
