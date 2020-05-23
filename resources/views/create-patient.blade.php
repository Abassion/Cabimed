@extends('layouts.home')


@section('main')
<div class="dashbord-main grey lighten-5">
    <div class="infos">
         <div class="information">
          <div class="image">
            <img src="{{ asset('assets/svg/SVG/patient.svg') }}" alt="">
          </div>
          <div class="text">
          <div class="title">
              Patients
          </div>
          <div class="value">
                 @if( count($patients) > 9 ) 
                    {{  count($patients) }}
                 @else 
                    {{ '0'. count($patients) }}
                 @endif

          </div> 
          </div>
         </div>
         <div class="information">
          <div class="image mr-3">
            <img src="{{ asset('assets/svg/SVG/calendar.svg') }}" alt="">
          </div>
          <div class="text">
          <div class="title">
              Aujourd'hui 
          </div>
          <div class="value date">
             <?php echo date("d M ,Y")?> 
          </div>
          </div>
         </div>
         <div class="information">
          <div class="image">
            <img src="{{ asset('assets/svg/SVG/medical-appointment.svg') }}" alt="">
          </div>
          <div class="text">
          <div class="title">
              RDV. AJ.
          </div>
          <div class="value">
              04
          </div>
          </div>

         </div>
    </div>
 <div class="container" style="padding-bottom: 8rem">
    <form action="{{ route('patient.store') }}" method="POST" class="ajouter_patient">
        @csrf
        <h1>Ajouter un nouveau patient</h1>
                <div class="form-group">
                    <label for="nom">Nom: </label>
                    <input class="form-control" id="nom" type="text" name="nom" value="">
                </div>
                <div class="form-group">
                    <label for="prenom">prenom: </label>
                    <input class="form-control" id="prenom" type="text" name="prenom" value="">
                </div>
    
                <div class="form-group">
                    <label for="date_nes">date de naissance: </label>
                    <input class="form-control" id="date_nes" type="date" name="date_naissance" value="">
                </div>
    
                <div class="form-group">
                    <label for="lieu_nes">lieu de naissance: </label>
                    <input class="form-control" id="lieu_nes" type="text" name="lieu_naissance" value="">
                </div>
    
                <div class="form-group">
                    <label for="adresse">adresse: </label>
                    <input class="form-control" id="adresse" type="text" name="adresse" value="">
                </div>
                <div class="form-group">
                    <label for="etat">etat civil: </label>
                    <input class="form-control" id="etat" type="text" name="etat_civil" value="">
                </div>
    
                <div class="form-group">
                    <label for="enfant">enfant: </label>
                    <input class="form-control" id="enfants" type="text" name="enfants" value="">
                </div>
    
                <div class="form-group">
                    <label for="tel">tel: </label>
                    <input class="form-control" id="tel" type="text" name="telephone" value="">
                </div>
    
                <div class="form-group">
                    <label for="poids">poids: </label>
                    <input class="form-control" id="poids" type="text" name="poids" value="">
                </div>
    
                <div class="form-group">
                    <label for="taille">taille: </label>
                    <input class="form-control" id="taille" type="text" name="taille" value="">
                </div>
                <div class="form-group">
                    <label for="tabagisme">Tabagisme: </label>
                    <input class="form-control" id="tabagisme" type="checkbox" name="tabagisme">
                </div>
                <div class="form-group">
                    <label for="allergie">Allergie: </label>
                    <input class="form-control" id="allergie" type="checkbox" name="allergie">
                </div>
                <button type='submit' name="submit" class=''><img src="{{ asset('assets/svg/SVG/heart.svg') }}" alt="">Ajouter</button>
            </form>
 </div>
</div>
@endsection