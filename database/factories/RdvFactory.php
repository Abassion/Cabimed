<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\rdv;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(rdv::class, function (Faker $faker) {

    return [
        'nom' => $faker->firstname,
        'prenom' => $faker->lastname,
        'gendre' => $faker->randomElement($array = array ('male','female')),
        'telephone' => $faker->e164PhoneNumber,
        'time' => "getRandomTimeThisAndNextMounth()",
        'age' => $faker->numberBetween($min = 20, $max = 99),
    ];
});
