<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rapport extends Model
{
    protected $fillable = ['patient_id','ecrit_par','pour','contenu','email','telephone','lieu','date'];
}
