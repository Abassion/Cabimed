<?php

namespace App\Http\Controllers;

use App\patient;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $patient = Patient::find($id);
        return view('partials.form_general')->with('patient',$patient);
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
                                   ->orderBy($trier,'asc')
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
                                    orderBy($trier,'asc')
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
        return view('partials.form_details')->with('patient',$patient);
    }
    public function test()
    {
        // reference the Dompdf namespace

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml('
<div class="view view-pages" id="view-page" data-category="divers">
<h1 class="view-title">Rapport médical : cancer du sein</h1>

<div id="rows-5bd5cdf2bd84812d497b81f0" class="rows clearfix" data-total-pages="1"
    data-current-page="1">

    <div class="row-container ligne-bleue page_1 ">
        <div class="row-content">
            <div class="row">



                <div class="column self-stretch" style="width:100%">
                    <div class="column-content">
                        <div class="clearfix">
                            <div style="background-color:#fcfcea;">
                                <p><span style="font-family:arial,helvetica,sans-serif;"></span>
                                </p>

                                <p>&nbsp;</p>

                                <div font-family:georgia="" style="margin-left: 60px;margin-right: 20px;&gt;
&lt;h4&gt;&lt;span style=">
                                    <h3><span style="font-family:arial,helvetica,sans-serif;">DR KARA-ZAITRI M.A</span>
                                    </h3>

                                    <p style="text-align: right;">
                                        <span style="font-family:arial,helvetica,sans-serif;">Tlemcen, le&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;</span>
                                    </p>

                                    <p style="text-align: center;">
                                        <span style="font-family:arial,helvetica,sans-serif;"></span>
                                    </p>

                                    <h3 style="text-align: center;">&nbsp;</h3>

                                    <h3 style="text-align: center;">
                                        <span style="font-family:arial,helvetica,sans-serif;"><strong>RAPPORT MEDICAL POUR</strong></span>
                                    </h3>

                                    <h3 style="text-align: center;">
                                        <span style="font-family:arial,helvetica,sans-serif;"><strong>RADIOTHERAPIE</strong></span>
                                    </h3>

                                    <hr style="border-bottom:1px solid black" />
                                    <p><span style="font-family:arial,helvetica,sans-serif;"></span>
                                    </p>

                                    <p><span style="font-family:arial,helvetica,sans-serif;"></span>
                                    </p>

                                    <p>&nbsp;</p>

                                    <p><span style="font-family:arial,helvetica,sans-serif;">Il s&rsquo;agit de la patiente &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;, &acirc;g&eacute;e de &hellip;&hellip;&hellip;&hellip;&hellip; ans, de groupe &hellip;&hellip;&hellip;&hellip;&hellip;qui a &eacute;t&eacute; hospitalis&eacute;e le &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip; au service de Gyn&eacute;cologie pour un cancer du sein droit confirm&eacute; par le tr&eacute;pied classique.</span>
                                    </p>

                                    <p><span style="font-family:arial,helvetica,sans-serif;">Il s&rsquo;agissait d&rsquo;une tumeur de 7 cm du QSE apparue 10 mois auparavant, avec notion de peau d&rsquo;orange et de r&eacute;traction du mamelon.</span>
                                    </p>

                                    <p><span style="font-family:arial,helvetica,sans-serif;">Classification&nbsp;TNM&nbsp;: T3 N1 M0 Pev0.</span>
                                    </p>

                                    <p><span style="font-family:arial,helvetica,sans-serif;">Une mastectomie radicale modifi&eacute;e (intervention de Patey) a &eacute;t&eacute; pratiqu&eacute;e le &hellip;&hellip;&hellip;&hellip;&hellip;&hellip; par moi-m&ecirc;me.</span>
                                    </p>

                                    <p><span style="font-family:arial,helvetica,sans-serif;">ANA-PATH&nbsp;: carcinome&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;.</span>
                                    </p>

                                    <p><span style="font-family:arial,helvetica,sans-serif;">Une chimioth&eacute;rapie adjuvante (post-op&eacute;ratoire) a &eacute;t&eacute; indiqu&eacute;e (type FAC)&nbsp;: 6 cures.</span>
                                    </p>

                                    <p><span style="font-family:arial,helvetica,sans-serif;">La 6<sup>&egrave;me</sup> cure date du &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;</span>
                                    </p>

                                    <p><span style="font-family:arial,helvetica,sans-serif;">L&rsquo;&eacute;volution &eacute;tait globalement satisfaisante, mis &agrave; part un lymph&oelig;d&egrave;me homolat&eacute;ral plus ou moins discret.</span>
                                    </p>

                                    <p><span style="font-family:arial,helvetica,sans-serif;"></span>
                                    </p>

                                    <p><span style="font-family:arial,helvetica,sans-serif;">Actuellement et vu l&rsquo;envahissement axillaire massif, de m&ecirc;me que la taille importante de la tumeur, une radioth&eacute;rapie compl&eacute;mentaire est indiqu&eacute;e pour compl&eacute;ter son traitement loco-r&eacute;gional.</span>
                                    </p>

                                    <p><span style="font-family:arial,helvetica,sans-serif;">Je reste &agrave; votre enti&egrave;re disposition pour la surveillance conjointe.</span>
                                    </p>

                                    <p><span style="font-family:arial,helvetica,sans-serif;"></span>
                                    </p>

                                    <p><span style="font-family:arial,helvetica,sans-serif;"></span>
                                    </p>

                                    <p style="text-align: right;">&nbsp;</p>

                                    <p style="text-align: right;">
                                        <span style="font-family:arial,helvetica,sans-serif;">Confraternellement.</span>
                                    </p>

                                    <p align="right">
                                        <span style="font-family:arial,helvetica,sans-serif;"></span>
                                    </p>

                                    <p align="right">
                                        <span style="font-family:arial,helvetica,sans-serif;"></span>
                                    </p>

                                    <p align="right">
                                        <span style="font-family:arial,helvetica,sans-serif;"></span>
                                    </p>

                                    <p align="right">
                                        <span style="font-family:arial,helvetica,sans-serif;"></span>
                                    </p>

                                    <p align="right">
                                        <span style="font-family:arial,helvetica,sans-serif;"></span>
                                    </p>

                                    <p align="right">
                                        <span style="font-family:arial,helvetica,sans-serif;"></span>
                                    </p>

                                    <p align="right">
                                        <span style="font-family:arial,helvetica,sans-serif;"></span>
                                    </p>

                                    <p align="right">
                                        <span style="font-family:arial,helvetica,sans-serif;"></span>
                                    </p>

                                    <p align="right">
                                        <span style="font-family:arial,helvetica,sans-serif;"></span>
                                    </p>

                                    <p align="right">
                                        <span style="font-family:arial,helvetica,sans-serif;"></span>
                                    </p>

                                    <p align="right">&nbsp;</p>

                                    <p align="right">&nbsp;</p>

                                    <p align="right">&nbsp;</p>

                                    <p align="right">&nbsp;</p>

                                    <p align="right">&nbsp;</p>

                                    <p align="right">&nbsp;</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
');

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
  return $dompdf->stream();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $patients = Patient::all();
        return view('create-patient')->with('patients',$patients);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $patient = new Patient;
        $patient->nom = $request->nom;
        $patient->prenom = $request->prenom;
        $patient->telephone = $request->telephone;
        $patient->enfants = $request->enfants;
        $patient->date_naissance = $request->date_naissance;
        $patient->lieu_naissance = $request->lieu_naissance;
        $patient->adresse = $request->adresse;
        $patient->poids = $request->poids;
        $patient->taille = $request->taille;
        $patient->etat_civil = $request->etat_civil;
        $patient->allergie = $request->has('allergie');
        $patient->tabagisme = $request->has('tabagisme');
        
        $patient->save();

        $request->session()->flash('succuess', 'Patient crée avec succés');

        return redirect('dashbord')->with('patients',Patient::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $patient = Patient::find($id);
        $patient->nom = $request->nom;
        $patient->prenom = $request->prenom;
        $patient->telephone = $request->telephone;
        $patient->enfants = $request->enfants;
        $patient->date_naissance = $request->date_naissance;
        $patient->lieu_naissance = $request->lieu_naissance;
        $patient->adresse = $request->adresse;
        $patient->poids = $request->poids;
        $patient->taille = $request->taille;
        $patient->etat_civil = $request->etat_civil;

        $patient->save();
        $request->session()->flash('success', 'Mise à jour réussite');
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
        $request->session()->flash('success', 'Mise à jour réussite');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $patient = Patient::find($id);
        $patient->delete();
        $request->session()->flash('success', 'Patient à été supprimer');
        return redirect()->route('dashbord');
    }
}
