<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Medecin;
use App\Adjoint;
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
        $médecin = App\Medecin::create([
            'nom' => 'John',
            'prenom' => 'Doe',
            'gendre'=>'male',
            'spécialité'=>'généraliste',
            'téléphone' => '+21378997541',
            'age' => 45
        ]);
        $adjoint = App\Adjoint::create([
            'nom' => 'Melisa',
            'prenom' => 'Marc',
            'gendre'=>'Female',
            'téléphone' => '+21378994441',
            'age' => 24
        ]);
       App\User::create([
        'username' =>'Dr '.$médecin->nom.' '.substr($médecin->prenom,0, 1).'.',
        'email' => 'medecin@email.com',
        'medecin_id'=> $médecin->id,
        'password' => Hash::make('12345678'),
        'image' => asset('assets/doctor.jpg')
       ]);
       App\User::create([
        'username' => 'Mdm.'.$adjoint->nom.' '.substr($adjoint->prenom, 0, 1).'.',
        'email' => 'secretaire@email.com',
        'adjoint_id'=> $adjoint->id,
        'password' => Hash::make('12345678'),
        'image' => asset('assets/sev.jpg')
        ]);
    }
}
