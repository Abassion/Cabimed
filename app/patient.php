<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class patient extends Model
{
    protected $fillable = ['nom','prenom','enfants','telephone','adresse','date_naissance','lieu_naissance','poids','taille','etat_civil','allergie'];
}
