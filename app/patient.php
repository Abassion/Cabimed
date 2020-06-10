<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class patient extends Model
{
    protected $fillable = ['nom','prenom','gendre','age','telephone','adresse','date_naissance','lieu_naissance','poids','taille','etat_civil','allergie','profession','email'];
    
    public static function calculateAge($date) {
        $age = date('Y') - date("Y", strtotime($date));
        return $age;
   }
}
