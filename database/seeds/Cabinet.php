<?php

use Illuminate\Database\Seeder;
use App\Cabinet as cab;


class Cabinet extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        cab::create([
            'nom'=>'cabinet-medical',
            'adresse'=>'Rue castors block 25',
            'téléphone'=>'+21378015545',
            'email'=>'cabinet-medical@email.com'
        ]);
    }
}
