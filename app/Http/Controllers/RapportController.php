<?php

namespace App\Http\Controllers;
use Dompdf\Dompdf;
use App\Patient;
use App\User;
use App\rdv;
use Auth;
use App\Rapport;
use App\Medecin;
use App\Cabinet;
use App\Ordonnance;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class RapportController extends Controller
{

    public function createRapport() 
    {
        if( Auth::user()->email == 'medecin@email.com' ) {
            $patients = Patient::select('nom','id','prenom','gendre','age','adresse','telephone')->get();
            return view('pages.imprimer.rapport-create')->with('patients',$patients)->with('nb_patients',Patient::count())->with('nb_rdv',rdv::getDayRdvCount())->with('cabinet',Cabinet::all()->first());
        } else {
            return abort(404);
        }
    }


    public function downloadRapport(Request $request) 
    {
        if( $request->mem_mail ) {
            $cabinet = Cabinet::all()->first();
            $cabinet->email = $request->mem_mail;
            $cabinet->save();
         }
         if( $request->mem_tel ) {
             $cabinet = Cabinet::all()->first();
             $cabinet->téléphone = $request->mem_tel;
             $cabinet->save();
         }
        $rapport = Rapport::create([
            'contenu' => $request->contenu,
            'patient_id' => json_decode($request->pour)->id,
            'date' => $request->date,
            'lieu' => $request->lieu,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'ecrit_par' => $request->dr
        ]);
        $medecin = Medecin::find($request->med_id);
        $contenu = $rapport->contenu;
        $pour  = json_decode($request->pour);
        $dr_name = $rapport->ecrit_par;
        $dr_spec = $medecin->spécialité;
        $date = $rapport->date;
        $lieu = $rapport->lieu;
        $telephone = $rapport->telephone;
        $email = $rapport->email;
        $pdf = PDF::loadView('pages.imprimer.rapport',compact('contenu','pour','dr_name','date','email','telephone','lieu','dr_spec'));
        return $pdf->download('rapport-medical.pdf');
    }


    public function createOrdonnance() 
    {
        if( Auth::user()->email == 'medecin@email.com' ) {
        $patients = Patient::select('nom','prenom','id','gendre','traitement','age','adresse','telephone')->get();
        return view('pages.imprimer.ordonnance-create')->with('patients',$patients)->with('nb_patients',Patient::count())->with('nb_rdv',rdv::getDayRdvCount())->with('cabinet',Cabinet::all()->first());
        } else {
            return abort(404);
        }
    }



    public function downloadOrdonnance(Request $request) 
    {
        if( $request->mem_mail ) {
            $cabinet = Cabinet::all()->first();
            $cabinet->email = $request->mem_mail;
            $cabinet->save();
         }
         if( $request->mem_tel ) {
             $cabinet = Cabinet::all()->first();
             $cabinet->téléphone = $request->mem_tel;
             $cabinet->save();
         }
        $traitement = json_decode($request->traitment,true);
        $arr = array();
        foreach ($traitement as $med) {
            $arr[] = $med['name'];
        }
        $ordonnance = Ordonnance::create([
            'traitement' => \implode(', ',$arr),
            'patient_id' => json_decode($request->pour)->id,
            'date' => $request->date,
            'lieu' => $request->lieu,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'ecrit_par' => $request->dr
        ]);
        $medecin = Medecin::find($request->med_id);
        $med_id = $request->med_id;
        $meds =  json_decode($request->traitment);
        $pour  = json_decode($request->pour);
        $dr_name = $ordonnance->ecrit_par;
        $dr_spec = $medecin->spécialité;
        $date = $ordonnance->date;
        $lieu = $ordonnance->lieu;
        $telephone = $ordonnance->telephone;
        $email = $ordonnance->email;
        $pdf = PDF::loadView('pages.imprimer.ordonnance',compact('meds','pour','dr_name','date','email','telephone','lieu','dr_spec'));
        return $pdf->download('rapport-medical.pdf');
    }

}
