@extends('patient')


@section('infos')
<v-card  evaluation="19">
    <v-card-title>
        <img src="{{asset('assets/svg/SVG/healthcare.svg')}}" class="svg-image mr-5" alt="" style="width: 5rem">
        <span>
            Fichier Personnelle
        </span>
    </v-card-title>
    <v-card-text>
<form action="{{ route('patient.update',['id'=> $patient->id ]) }}" method="POST" id="form-update">
    @csrf
    <div class="row justify-content-around">
        <div class="form-group" style="flex-basis: 45%">
            <label for="nom">Nom: </label>
        <input class="form-control" id="nom" type="text" name="nom" value="{{ $patient->nom }}">
        </div>
        <div class="form-group" style="flex-basis: 45%">
            <label for="prenom">prenom: </label>
            <input class="form-control" id="prenom" type="text" name="prenom" value="{{ $patient->prenom }}">
        </div>
    </div>
         
    <div class="row justify-content-around">
            <div class="form-group" style="flex-basis: 45%">
                <label for="date_nes">date de naissance: </label>
                <input class="form-control" id="date_nes" type="text" name="date_naissance" value="{{ $patient->date_naissance }}">
            </div>
            <div class="form-group" style="flex-basis: 45%">
                <label for="lieu_nes">lieu de naissance: </label>
                <input class="form-control" id="lieu_nes" type="text" name="lieu_naissance" value="{{ $patient->lieu_naissance }}">
            </div>
    </div>
    
            <div class="row justify-content-around">
            <div class="form-group" style="flex-basis: 45%">
                <label for="adresse">adresse: </label>
                <input class="form-control" id="adresse" type="text" name="adresse" value="{{ $patient->adresse }}">
            </div>
            <div class="form-group" style="flex-basis: 45%">
                <label for="etat">etat civil: </label>
                <input class="form-control" id="etat" type="text" name="etat_civil" value="{{ $patient->etat_civil }}">
            </div>
        </div>
        <div class="row justify-content-around">
            <div class="form-group" style="flex-basis: 45%">
                <label for="enfant">enfant: </label>
                <input class="form-control" id="enfants" type="text" name="enfants" value="{{ $patient->enfants }}">
            </div>

            <div class="form-group" style="flex-basis: 45%">
                <label for="tel">tel: </label>
                <input class="form-control" id="tel" type="text" name="telephone" value="{{ $patient->telephone }}">
            </div>
        </div>
        <div class="row justify-content-around">
            <div class="form-group" style="flex-basis: 45%">
                <label for="poids">poids: </label>
                <input class="form-control" id="poids" type="text" name="poids" value="{{ $patient->poids }}">
            </div>

            <div class="form-group" style="flex-basis: 45%">
                <label for="taille">taille: </label>
                <input class="form-control" id="taille" type="text" name="taille" value="{{ $patient->taille }}">
            </div>
        </div>
</form>
</v-card-text>
</v-card>
@endsection

<style>

</style>