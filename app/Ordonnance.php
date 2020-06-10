<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordonnance extends Model
{
    protected $fillable = ['patient_id','ecrit_par','pour','traitement','email','telephone','lieu','date'];
}
