<?php

use Illuminate\Database\Seeder;
use App\Patient;
class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Patient::class,22)->create();
    }
}
