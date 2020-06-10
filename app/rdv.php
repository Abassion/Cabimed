<?php

namespace App;
use Datetime;
use Illuminate\Database\Eloquent\Model;

class rdv extends Model
{
    protected $fillable = ['nom','prenom','telephone','temp','gendre','age'];

    static public function getDayRdvCount() {
        $day = date('Y-m-d');
        $rdvs = rdv::whereDate('temp',$day)->count();
        return $rdvs < 10 ? '0'.$rdvs:$rdvs;
    }
    
}
