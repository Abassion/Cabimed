@extends('layouts.layout-patient')
@section('infos')
<v-card  evaluation="19">
    <v-card-title>
        <img src="{{asset('assets/svg/SVG/healthcare.svg')}}" class="svg-image mr-5" alt="" style="width: 5rem">
        <span>
            Fichier Personnel
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
                    <label for="prenom">Prénom: </label>
                    <input class="form-control" id="prenom" type="text" name="prenom" value="{{ $patient->prenom }}">
                </div>
            </div>
            <div class="row justify-content-around">
            <div class="form-group" style="flex-basis: 45%">
                <label for="date_nes">Date de naissance: </label>
                <input class="form-control" id="date_nes" type="text" name="date_naissance" value="{{ $patient->date_naissance }}">
            </div>
            <div class="form-group" style="flex-basis: 45%">
                <label for="gendre">Gendre: </label>
                <input class="form-control" id="gendre" type="text" name="gendre" value="{{ $patient->gendre }}">
            </div>
            </div>
            <div class="row justify-content-around">
            <div class="form-group" style="flex-basis: 45%">
                <label for="adresse">Adresse: </label>
                <input class="form-control" id="adresse" type="text" name="adresse" value="{{ $patient->adresse }}">
            </div>
            <div class="form-group" style="flex-basis: 45%">
                <label for="etat">Etat civil: </label>
                <input class="form-control" id="etat" type="text" name="etat_civil" value="{{ $patient->etat_civil }}">
            </div>
        </div>
        <div class="row justify-content-around">
            <div class="form-group" style="flex-basis: 45%">
                <label for="lieu_nes">Lieu de naissance: </label>
                <input class="form-control" id="lieu_nes" type="text" name="lieu_naissance" value="{{ $patient->lieu_naissance }}">
            </div>

            <div class="form-group" style="flex-basis: 45%">
                <label for="tel">Téléphone: </label>
                <input class="form-control" id="tel" type="text" name="telephone" value="{{ $patient->telephone }}">
            </div>
        </div>
        <div class="row justify-content-around">
            <div class="form-group" style="flex-basis: 45%">
                <label for="email">Email: </label>
                <input class="form-control" id="email" type="text" name="email" value="{{ $patient->email }}">
            </div>

            <div class="form-group" style="flex-basis: 45%">
                <label for="tel">Profession: </label>
                <input class="form-control" id="tel" type="text" name="profession" value="{{ $patient->profession }}">
            </div>
        </div>
        <div class="row justify-content-around">
            <div class="form-group" style="flex-basis: 45%">
                <label for="poids">Poids: </label>
                <input class="form-control" id="poids" type="text" name="poids" value="{{ $patient->poids }}">
            </div>

            <div class="form-group" style="flex-basis: 45%">
                <label for="taille">Taille: </label>
                <input class="form-control" id="taille" type="text" name="taille" value="{{ $patient->taille }}">
            </div>
        </div>
</form>
</v-card-text>
</v-card>
@endsection
