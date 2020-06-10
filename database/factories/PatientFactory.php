<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Patient;
use Faker\Generator as Faker;

$factory->define(Patient::class, function (Faker $faker) {
    $date_naissance  = $faker->date($format = 'Y-m-d', $max = 'now');
    return [
            'nom' => $faker->firstName,
            'prenom' => $faker->lastName,
            'date_naissance' => $date_naissance ,
            'age' => Patient::calculateAge($date_naissance),
            'profession' => $faker->randomElement($array = array ('etudiant','maitre','plombier','chauffeur','taxier','fermier')),
            'email' => $faker->email,
            'lieu_naissance' => $faker->city,
            'gendre' => $faker->randomElement($array = array ('male','female')),
            'poids' => $faker->numberBetween($min = 50, $max = 120),
            'etat_civil' =>$faker->randomElement($array = array ('célébataire','mariée')),
            'telephone' => $faker->e164PhoneNumber ,
            'taille' => $faker->numberBetween($min = 150, $max = 200),
            'adresse'=>$faker->streetAddress, 
            'temperature'=>$faker->numberBetween($min = 36, $max = 42), 
            'tension_arterielle'=>$faker->numberBetween($min = 7, $max = 12),
            'antecedents_cherirgieaux'=>implode('-',$faker->words($nb = 4, $asText = false)),
            'antecedents_medicaux'=>implode('-',$faker->words($nb = 4, $asText = false)),
            'allergie'=>$faker->randomElement($array = array (true,false)),
            'allergie_medicamenteuse'=>implode('-',$faker->words($nb = 4, $asText = false)),
            'tabagisme'=>$faker->randomElement($array = array (true,false)),
            'traitement'=>implode('-',$faker->words($nb = 3, $asText = false)),


    ];
});