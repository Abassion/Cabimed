<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\rdv;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $patients = Patient::count();
        $nb_rdv = rdv::getDayRdvCount();
        return view('pages.dashbord')->with('nb_patients',$patients)->with('nb_rdv',$nb_rdv);
    }
    
    public function accueil() {
        
    }
}
