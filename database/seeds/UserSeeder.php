<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       App\User::create([
        'name' => 'Médecin',
        'email' => 'medecin@email.com',
        'password' => Hash::make('12345678'),
        'image' => asset('assets/doctor.jpg')
       ]);
       App\User::create([
        'name' => 'Secrétaire',
        'email' => 'secretaire@email.com',
        'password' => Hash::make('12345678'),
        'image' => asset('assets/sev.jpg')
        ]);
    }
}
