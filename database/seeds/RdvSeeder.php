<?php

use Illuminate\Database\Seeder;
use App\rdv;
use Carbon\Carbon;
use Faker\Generator as Faker;
class RdvSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $now = Carbon::now();
        rdv::create([
            'nom' => $faker->firstname,
            'prenom' => $faker->lastname,
            'gendre' => 'male',
            'telephone' => $faker->e164PhoneNumber,
            'temp' => '2020-06-13 15:00:00',
            'age' => '24',
        ]);
        rdv::create([
            'nom' => $faker->firstname,
            'prenom' => $faker->lastname,
            'gendre' => 'male',
            'telephone' => $faker->e164PhoneNumber,
            'temp' => '2020-06-26 12:00:00',
            'age' => '30',
        ]);
        rdv::create([
            'nom' => $faker->firstname,
            'prenom' => $faker->lastname,
            'gendre' => 'male',
            'telephone' => $faker->e164PhoneNumber,
            'temp' => '2020-05-26 14:00:00',
            'age' => '55',
        ]);
        rdv::create([
            'nom' => $faker->firstname,
            'prenom' => $faker->lastname,
            'gendre' => 'male',
            'telephone' => $faker->e164PhoneNumber,
            'temp' => '2020-05-26 17:00:00',
            'age' => '63',
        ]);
        rdv::create([
            'nom' => $faker->firstname,
            'prenom' => $faker->lastname,
            'gendre' => 'male',
            'telephone' => $faker->e164PhoneNumber,
            'temp' => '2020-05-24 16:00:00',
            'age' => '19',
        ]);
        rdv::create([
            'nom' => $faker->firstname,
            'prenom' => $faker->lastname,
            'gendre' => 'male',
            'telephone' => $faker->e164PhoneNumber,
            'temp' => '2020-06-12 15:00:00',
            'age' => '24',
        ]);
        rdv::create([
            'nom' => $faker->firstname,
            'prenom' => $faker->lastname,
            'gendre' => 'male',
            'telephone' => $faker->e164PhoneNumber,
            'temp' => '2020-05-23 12:00:00',
            'age' => '30',
        ]);
        rdv::create([
            'nom' => $faker->firstname,
            'prenom' => $faker->lastname,
            'gendre' => 'male',
            'telephone' => $faker->e164PhoneNumber,
            'temp' => '2020-05-23 14:00:00',
            'age' => '55',
        ]);
        rdv::create([
            'nom' => $faker->firstname,
            'prenom' => $faker->lastname,
            'gendre' => 'male',
            'telephone' => $faker->e164PhoneNumber,
            'temp' => '2020-05-23 17:00:00',
            'age' => '63',
        ]);
        rdv::create([
            'nom' => $faker->firstname,
            'prenom' => $faker->lastname,
            'gendre' => 'male',
            'telephone' => $faker->e164PhoneNumber,
            'temp' => '2020-06-10 16:00:00',
            'age' => '18',
        ]);
    }
}
