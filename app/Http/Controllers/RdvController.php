<?php

namespace App\Http\Controllers;

use App\rdv;
use App\Patient;

use Illuminate\Http\Request;

class RdvController extends Controller
{
    
    public function create(Request $request) {
        $rdv = rdv::create([
            'nom'=> $request->nom,
            'temp' => $request->time,
            'prenom'=> $request->prenom,
            'age'=> $request->age,
            'telephone'=> $request->telephone,
            'gendre'=> $request->gendre
        ]);
        $request->session()->flash('success', 'rendez-vous pris avec succés');
        return 'rendez-vous pris avec succés';
    }

    public function getNext() {
        $toDay = date('Y-m-d');
        $rdvs = rdv::whereDate('temp','>',$toDay)->get();
        return $rdvs;
    }
    public function index() {
        $nb_patients = Patient::count();
        $nb_rdv = rdv::count();
        return view('pages.rendez-vous')->with('nb_patients',$nb_patients)->with('nb_rdv',$nb_rdv);
    }
    public function getDayRdv($date) {
       $day =date('Y-m-d');
       $rdvs = rdv::whereDate('temp', '=', $day)->get();
       return $rdvs;
    }
    public function destroy(Request $request,$id) {
        rdv::destroy($id);
        $request->session()->flash('success', 'Rendez-vous à été supprimer');
        return redirect()->route('rendez-vous-page');
    }
}
