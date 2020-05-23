@extends('layouts.home')



@section('main')
    <div class="container p-5" >
        <div class="patient-header">
            <div class="logo">
                <v-list-item >
                    <v-list-item-avatar color="teal accent-3 white--text" class="patient-avatar">A</v-list-item-avatar>
                    <v-list-item-content>
                      <v-list-item-title class="headline">{{ $patient->prenom }} {{ $patient->nom }}</v-list-item-title>
                      <v-list-item-subtitle>{{ $patient->telephone }}</v-list-item-subtitle>
                    </v-list-item-content>
                  </v-list-item>
            </div>
            <div class="patient-buttons">
                <button
                      class="btn btn-outline-primary"
                >
            <img src="{{asset('assets/svg/SVG/phone.svg')}}" class="svg-image" alt="">
  Appeler
  </button>
<button
  class="btn btn-outline-success"
  onclick="document.getElementById('form-update').submit();"
>
<img src="{{asset('assets/svg/SVG/refresh.svg')}}"  class="svg-image" alt="">
    Update
</button>
<form action="{{ route('patient.delete',['id'=>$patient->id]) }}" method="POST" class="mb-5" style="display: inline">
  @csrf
  <button
  type="submit"
  class="btn btn-outline-danger"
>
<img src="{{asset('assets/svg/SVG/delete.svg')}}" class="svg-image" alt="">
Supprimer
</button>
</form>

            </div>
        </div>
        <hr>
       @yield('infos')
       <div class="pagination d-block text-center mt-5">
         @if(Route::currentRouteName() == 'patient.detail' )
        <a href="{{ route('patient',['id'=>$patient->id ]) }}" class="btn btn-primary white--text">
            Voir informations général
        </a>
        @else
            <a href="{{ route('patient.detail',['id'=>$patient->id]) }}" class="btn btn-primary white--text">Voir Fichier Medical</a>
        @endif
        </div>      
    </div>


@endsection
