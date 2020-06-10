@extends('layouts.layout-admin')
@section('main')
 <div class="container" style="padding-bottom: 8rem">
    <form action="{{ route('patient.store') }}" method="POST" class="ajouter_patient">
        @csrf
        <h1>Ajouter un nouveau patient</h1>

                <div class="form-group">
                    <label for="nom">Nom: </label>
                <input class="form-control" id="nom" type="text" name="nom" value="{{ old('nom') }}">
                     @if($errors->has('nom')) 
                    <div class="form-error">
                        {{ $errors->get('nom')[0]  }}
                    </div>
                     @endif
                </div>
                <div class="form-group">
                    <label for="prenom">Prenom: </label>
                    <input class="form-control" id="prenom" type="text" name="prenom" value="{{ old('prenom') }}">
                    @if($errors->has('prenom')) 
                    <div class="form-error">
                        {{ $errors->get('prenom')[0]  }}
                    </div>
                     @endif
                </div>
                <div class="form-group">
                    <label for="enfant">Gendre: </label>
                    <input class="form-control" id="gendre" type="text" name="gendre" value="{{ old('gendre') }}">
                    @if($errors->has('gendre')) 
                    <div class="form-error">
                        {{ $errors->get('gendre')[0]  }}
                    </div>
                     @endif
                </div>
                <div class="form-group">
                    <label for="date_nes">Date de naissance: </label>
                    <input class="form-control" id="date_nes" type="date" name="date_naissance" value="{{ old('date_naissance') }}">
                    @if($errors->has('date_naissance')) 
                    <div class="form-error">
                        {{ $errors->get('date_naissance')[0]  }}
                    </div>
                     @endif
                </div>
    
                <div class="form-group">
                    <label for="lieu_nes">Lieu de naissance: </label>
                    <input class="form-control" id="lieu_nes" type="text" name="lieu_naissance" value="{{ old('lieu_naissance') }}">
                    @if($errors->has('lieu_naissance')) 
                    <div class="form-error">
                        {{ $errors->get('lieu_naissance')[0]  }}
                    </div>
                     @endif
                </div>
    
                <div class="form-group">
                    <label for="adresse">Adresse: </label>
                    <input class="form-control" id="adresse" type="text" name="adresse" value="{{ old('adresse') }}">
                    @if($errors->has('adresse')) 
                    <div class="form-error">
                        {{ $errors->get('adresse')[0]  }}
                    </div>
                     @endif
                </div>
                <div class="form-group">
                    <label for="etat">Etat civil: </label>
                    <input class="form-control" id="etat" type="text" name="etat_civil" value="{{ old('etat_civil') }}">
                    @if($errors->has('etat_civil')) 
                    <div class="form-error">
                        {{ $errors->get('etat_civil')[0]  }}
                    </div>
                     @endif
                </div>
                <div class="form-group">
                    <label for="prof">Profession: </label>
                    <input class="form-control" id="prof" type="text" name="profession" value="{{ old('profession') }}">
                    @if($errors->has('profession')) 
                    <div class="form-error">
                        {{ $errors->get('profession')[0]  }}
                    </div>
                     @endif
                </div>
                <div class="form-group">
                    <label for="email">Email: </label>
                    <input class="form-control" id="email" type="text" name="email" value="{{ old('email') }}">
                    @if($errors->has('email')) 
                    <div class="form-error">
                        {{ $errors->get('email')[0]  }}
                    </div>
                     @endif
                </div>
                <div class="form-group">
                    <label for="tel">N° tel.: </label>
                    <input class="form-control" id="tel" type="text" name="telephone" value="{{ old('telephone') }}">
                    @if($errors->has('telephone')) 
                    <div class="form-error">
                        {{ $errors->get('telephone')[0]  }}
                    </div>
                     @endif
                </div>
                <div class="form-group">
                    <label for="poids">Poids: </label>
                    <input class="form-control" id="poids" type="text" name="poids" value="{{ old('poids') }}">
                    @if($errors->has('poids')) 
                    <div class="form-error">
                        {{ $errors->get('poids')[0]  }}
                    </div>
                     @endif
                </div>
                <div class="form-group">
                    <label for="taille">Taille: </label>
                    <input class="form-control" id="taille" type="text" name="taille" value="{{ old('taille') }}">
                    @if($errors->has('taille')) 
                    <div class="form-error">
                        {{ $errors->get('taille')[0]  }}
                    </div>
                     @endif
                </div>
                <div class="form-group">
                    <label for="tabagisme">Tabagisme: </label>
                    <input class="form-control" id="tabagisme" type="checkbox" name="tabagisme" >
                </div>
                <div class="form-group">
                    <label for="allergie">Allergie: </label>
                    <input class="form-control" id="allergie" type="checkbox" name="allergie">
                </div>
                <button type='submit' name="submit" class=''><img src="{{ asset('assets/svg/SVG/heart.svg') }}" alt="">Ajouter</button>
        </form>
</div>
@endsection

