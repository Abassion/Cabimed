<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('profession')->default('employé');
            $table->string('email');
            $table->string('etat_civil');
            $table->string('gendre');
            $table->string('telephone');
            $table->integer('poids');
            $table->string('adresse');
            $table->integer('taille');
            $table->float('tension_arterielle')->nullable();
            $table->float('temperature')->nullable();
            $table->date('date_naissance');
            $table->integer('age');
            $table->string('lieu_naissance');
            $table->text('antecedents_medicaux')->nullable();
            $table->text('antecedents_cherirgieaux')->nullable();
            $table->text('traitement')->nullable();
            $table->boolean('allergie')->defaul(0);
            $table->boolean('tabagisme')->defaul(0);
            $table->text('allergie_medicamenteuse')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
