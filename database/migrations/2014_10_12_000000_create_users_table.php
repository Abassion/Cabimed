<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
  
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('username');
            $table->boolean('superviseur')->default(0);
            $table->string('image');
            $table->string('email_de_contact')->nullable();
            $table->string('medecin_id')->nullable();
            $table->string('adjoint_id')->nullable();
            $table->string('telephone_de_contact')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('users');
    }
}
