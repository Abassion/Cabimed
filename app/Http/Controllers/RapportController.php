<?php

namespace App\Http\Controllers;
use Dompdf\Dompdf;
use App\Patient;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class RapportController extends Controller
{
    public function createRapport() {
        $patients = Patient::select('nom','id')->get();
        return view('imprimer.rapport-create')->with('patients',$patients);
    }
    public function downloadRapport(Request $request) {
        $pdf = PDF::loadView('imprimer.rapport');
        return $pdf->download('rapport-medical.pdf');
    }
    public function createOrdonnance() {
        $patients = Patient::select('nom','id')->get();
        return view('imprimer.ordonnance-create')->with('patients',$patients);
    }
    public function downloadOrdonnance(Request $request) {
        $meds = json_decode($request->traitment,true);
         $pdf = PDF::loadView('imprimer.ordonnance',compact('meds'));
        return $pdf->download('rapport-medical.pdf');
    }
}
