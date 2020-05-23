<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Patient;
use Faker\Generator as Faker;

$factory->define(Patient::class, function (Faker $faker) {
    return [
            'nom' => $faker->firstName,
            'prenom' => $faker->lastName,
            'date_naissance' => $faker->date($format = 'Y-m-d', $max = 'now'),
            'lieu_naissance' => $faker->city,
            'enfants' => $faker->numberBetween($min = 0, $max = 5),
            'poids' => $faker->numberBetween($min = 50, $max = 120),
            'etat_civil' =>$faker->randomElement($array = array ('célébataire','mariée')),
            'telephone' => $faker->e164PhoneNumber ,
            'taille' => $faker->numberBetween($min = 150, $max = 200),
            'adresse'=>$faker->streetAddress, 
            'temperature'=>$faker->numberBetween($min = 36, $max = 42), 
            'tension_arterielle'=>$faker->numberBetween($min = 7, $max = 12),
            'antecedents_cherirgieaux'=>$faker->sentence($nbWords = 6, $variableNbWords = true),
            'antecedents_cherirgieaux'=>$faker->sentence($nbWords = 6, $variableNbWords = true),
            'allergie'=>$faker->randomElement($array = array (true,false)),
            'allergie_medicamenteuse'=>$faker->sentence($nbWords = 6, $variableNbWords = true),
            'tabagisme'=>$faker->randomElement($array = array (true,false)),
            'traitement'=>$faker->sentence($nbWords = 12, $variableNbWords = true),


    ];
});