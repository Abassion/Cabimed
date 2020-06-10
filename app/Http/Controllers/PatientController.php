<?php

namespace App\Http\Controllers;

use App\patient;
use App\rdv;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePatient;
use Dompdf\Dompdf;
use App\Mail\Email;
use Illuminate\Support\Facades\Mail;
class PatientController extends Controller
{


    public function index($id)
    {
        $patient = Patient::find($id);
        return view('pages.informations-patient')->with('patient',$patient);
    }
    public function getPatients(Request $request)
    {
            if ($request->query('str')) {
              
                $nom = $request->query('str');
                if($request->query('trier')) {
                    $trier = $request->query('trier');
                    $patients = Patient::where('nom', 'regexp', '^'.$nom)
                                   ->orWhere('prenom', 'regexp', '^'.$nom)
                                   ->orWhereRaw("CONCAT(`nom`, ' ', `prenom`) LIKE ?", ['%'.$nom.'%'])
                                   ->orderBy($trier,$trier == 'age' ? 'desc':'asc')
                                   ->paginate(6);       
                } else {
                    $patients = Patient::where('nom', 'LIKE', "%$nom%")
                                   ->orWhere('prenom', 'LIKE', "%$nom%")
                                   ->orWhereRaw("CONCAT(`nom`, ' ', `prenom`) LIKE ?", ['%'.$nom.'%'])
                                   ->paginate(6);
                }
                return $patients;
            } else {
                if($request->query('trier')) {
                    $trier = $request->query('trier');
                    $patients = Patient::
                                    orderBy($trier,$trier == 'age' ? 'desc':'asc')
                                   ->paginate(6);       
                } else {
                    $patients = Patient::orderBy('created_at','desc')->paginate(6); 
                }
                return $patients;
            }
    }

    public function detail($id)
    {
        $patient = Patient::find($id);
        return view('pages.fichier-médical')->with('patient',$patient);
    }

    public function create()
    {   $patients = Patient::count();
        return view('pages.ajouter-patient')->with('nb_patients',$patients)->with('nb_rdv',rdv::getDayRdvCount());
    }

    
    public function store(CreatePatient $request)
    {

        $patient = new Patient;
        $patient->nom = $request->nom;
        $patient->prenom = $request->prenom;
        $patient->telephone = $request->telephone;
        $patient->gendre = $request->gendre;
        $patient->profession = $request->profession;
        $patient->email = $request->email;
        $patient->date_naissance = $request->date_naissance;
        $patient->age = Patient::calculateAge($request->date_naissance);
        $patient->lieu_naissance = $request->lieu_naissance;
        $patient->adresse = $request->adresse;
        $patient->poids = $request->poids;
        $patient->taille = $request->taille;
        $patient->etat_civil = $request->etat_civil;
        $patient->allergie = $request->has('allergie');
        $patient->tabagisme = $request->has('tabagisme');
        
        $patient->save();

        $request->session()->flash('succuess', 'Patient crée avec succés');

        return redirect()->route('dashbord')->with('patients',Patient::all());
    }

    public function sendMail (Request $request) {
        $patient = json_decode($request->patient);
        Mail::to($request->email)->send(new Email($request->contenu,$patient)); 
        return true;
    }
    
    public function update(Request $request, $id)
    {
        $patient = Patient::find($id);
        $patient->nom = $request->nom;
        $patient->prenom = $request->prenom;
        $patient->telephone = $request->telephone;
        $patient->gendre = $request->gendre;
        $patient->profession = $request->profession;
        $patient->email = $request->email;
        $patient->date_naissance = $request->date_naissance;
        $patient->age = Patient::calculateAge($request->date_naissance);
        $patient->lieu_naissance = $request->lieu_naissance;
        $patient->adresse = $request->adresse;
        $patient->poids = $request->poids;
        $patient->taille = $request->taille;
        $patient->etat_civil = $request->etat_civil;

        $patient->save();
        $request->session()->flash('success','Mise à jour réussite');
        return redirect()->back();
    }

    public function updateDetails(Request $request, $id)
    {
        $patient = Patient::find($id);
        $patient->traitement = $request->traitement;
        $patient->antecedents_medicaux = $request->antecedents_medicaux;
        $patient->temperature = $request->temperature;
        $patient->allergie = $request->has('allergie');
        $patient->tabagisme = $request->has('tabagisme');
        $patient->tension_arterielle = $request->tension_arterielle;
        $patient->antecedents_cherirgieaux = $request->antecedents_cherirgieaux;
        $patient->allergie_medicamenteuse = $request->allergie_medicamenteuse;

        $patient->save();
        $request->session()->flash('success','Mise à jour réussite');
        return redirect()->back();
    }

    public function destroy(Request $request,$id)
    {
        $patient = Patient::find($id);
        $patient->delete();
        $request->session()->flash('success','Patient à été supprimer');
        return redirect()->route('dashbord');
    }
}
