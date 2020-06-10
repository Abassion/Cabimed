@extends('layouts.layout-patient')
@section('infos')
<div>
<form action="{{ route('patient.update-details',['id'=>$patient->id]) }}" method="POST" id="form-update">
    @csrf
    <div class="row justify-content-around">
        <div class="form-group" style="flex-basis: 45%">
              <v-card
              elevation="19"
              min-height="210"
            >
              <v-card-title>
                <img src="{{asset('assets/svg/SVG/bottle.svg')}}" class="svg-image" alt="">
                <span class="titre ml-2">Traitement</span>
              </v-card-title>
              <surface-text info="{{ $patient->traitement }}" id="traitement"  @if(Auth::user()->id == 1) allowed="true" @endif></surface-text>
             </v-card>
         </div>
          <div class="form-group" style="flex-basis: 45%">
            <v-card
            elevation="19"
            min-height="210"
          >
            <v-card-title>
              <img src="{{asset('assets/svg/SVG/medication.svg')}}" class="svg-image" alt="">
              </v-icon>
              <span class="titre ml-2 ml-2">Antécédents medicaux</span>
            </v-card-title>
        
            <surface-text info="{{ $patient->antecedents_medicaux }}" id="antecedents_medicaux"  @if(Auth::user()->id == 1) allowed="true" @endif></surface-text>
          </v-card>
          </div>
          </div>
          <div class="row justify-content-around">
              <div class="form-group" style="flex-basis: 45%">
                <v-card
                elevation="19"
                min-height="210"
              >
                <v-card-title>
                  <img src="{{asset('assets/svg/SVG/mattress.svg')}}" class="svg-image" alt="">
                  </v-icon>
                  <span class="titre ml-2 ml-2">Antécédents cherirgieaux</span>
                </v-card-title>
            
                <surface-text info="{{ $patient->antecedents_cherirgieaux }}" id="antecedents_cherirgieaux" @if(Auth::user()->id == 1) allowed="true" @endif></surface-text>
              </v-card>
              </div>
                <div class="form-group" style="flex-basis: 45%">
                  <v-card
                  elevation="19"
                  min-height="210"
                >
                  <v-card-title>
                  <img src="{{asset('assets/svg/SVG/nose.svg')}}" class="svg-image" alt="">
                    </v-icon>
                    <span class="titre ml-2 ml-2">Allergie médicamenteuse</span>
                  </v-card-title>
                  <surface-text info="{{ $patient->allergie_medicamenteuse }}" id="allergie_medicamenteuse"  @if(Auth::user()->id == 1) allowed="true" @endif></surface-text>
                </v-card>
              </div>
          </div>
            <div class="row justify-content-around p2">
              <v-card
                elevation="19"
                style="flex-basis: 45%"
                class="d-flex px-2 py-5 justify-content-around"
              >
            <div class="form-group" >
              <label for="Temperature" class="form-check-label mb-2" style="font-size: 1.8rem">
                <img src="{{asset('assets/svg/SVG/termo.svg')}}" class="svg-image" alt="" style="width: 3rem">
                Temp.
              </label>
              <input class="form-control" id="Temperature" type="number" name="temperature" value="{{ $patient->temperature }}" style="width: 6rem; margin: 0 auto; font-size: 1.4rem">
        </div>
          <div class="form-group" >
              <label for="Tension" class="form-check-label mb-2" style="font-size: 1.8rem">
                <img src="{{asset('assets/svg/SVG/press.svg')}}" class="svg-image" alt="" style="width: 3rem">
                Tension art. </label>
              <input class="form-control" id="Tension" type="number" name="tension_arterielle" value="{{ $patient->tension_arterielle }}" style="width: 6rem; margin: 0 auto; font-size: 1.4rem">
          </div>
        </v-card>
          <v-card
          elevation="19"
          style="flex-basis: 45%;font-size: 2rem"
          class="d-flex px-2 py-5 justify-content-around"
        >
          <div class="form-group" >
              <div class="form-check">
                <label class="form-check-label mr-2" for="allergie" >
                  <img src="{{asset('assets/svg/SVG/nose.svg')}}" class="svg-image" alt="" style="width: 3rem">
                  Allergie</label>
                  @if(Auth::user()->id == 1 )
                    <input type="checkbox" class="d-block mx-auto mt-5" style="transform: scale(2)" id="allergie" {{ $patient->allergie ? 'checked' : '' }} name="allergie" label="Allergie" value="1">
                    @elseif(Auth::user()->id != 1 && $patient->allergie )
                    <img src="{{asset('assets/svg/SVG/correct.svg')}}" class="svg-image correct" alt="" style="width: 3rem">
                  @endif
              </div>
          </div>
          <div class="form-group" >
            <div class="form-check">
              <label class="form-check-label  mr-2" for="tabagisme">
                <img src="{{asset('assets/svg/SVG/cig.svg')}}" class="svg-image" alt="" style="width: 3rem">
                Tabagisme</label>
                @if(Auth::user()->id == 1)
                <input type="checkbox" class="d-block mx-auto mt-5" style="transform: scale(2)" id="tabagisme"  name="tabagisme" class="switch-input" value="1" {{ $patient->tabagisme ? 'checked="checked"' : '' }}>
                @elseif(Auth::user()->id != 1 && $patient->tabagisme )
                  <img src="{{asset('assets/svg/SVG/correct.svg')}}" class="svg-image correct" alt="" style="width: 3rem">
                @endif
            </div>
          </div>
      </v-card>
    </div>
   </form>
</div>
@endsection

<style>
 .v-card__title > img {
   width: 4rem;
 }

 .v-card__title .titre {
  font-size: 1.65rem !important;
  font-weight: 500;
 }
 .titre {
  font-size: 1.65rem !important;
  font-weight: 500;
 }
 .v-card__actions {
   position: absolute;
   top: 70%;
   left: 0;
   right: 0;
 }
 #traitement {
   position: absolute;
   top: 90%;
   left: 50%;
   transform: translate(-50%,-50%)
 }
 .btn {
        font-size: 1.4rem !important
    }
    .correct {
      width: 3rem;
    display: block;
    margin: 0 auto;
    margin-top: .75rem;
    }
</style>