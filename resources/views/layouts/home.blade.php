@extends('layouts.app')

@section('content')
<header class="dashbord-header" >
    <div class="dashbord">
        Dashbord
    </div>
    <div class="panel">
        <div class="logo_utilisateur">
        <img src="{{ Auth::user()->image }}" alt="">
        </div>
        <div class="nom">
           {{ Auth::user()->name }}
        </div>
        <form id="frm-logout" action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="deconnexion btn">
               Déconnexion
            </button>
        </form>
        
    </div>
</header>
<section class="main" >
<div class="side-bar">
    <div class="nouveau">
    <a class="btn" href="{{ route('patient.create') }}">
                <img src="{{ asset('assets/svg/SVG/user-plus.svg') }}" alt="">
                <span>nouveau </span>
            </a>
    </div>
    <ul>
        <li> <img src="{{ asset('assets/svg/SVG/list.svg') }}" alt="">
            Trier
            <ul class="tri">
                <li @click="trier('nom')"> <img src="{{ asset('assets/svg/SVG/minus.svg') }}" alt="">
                    Nom</li>
                <li @click="trier('date_naissance')"> <img src="{{ asset('assets/svg/SVG/minus.svg') }}" alt=""><span>Date de naissance</span></li>
            </ul>
        </li>
        <li> <img src="{{ asset('assets/svg/SVG/search.svg') }}" alt="">
            Rechercher</li>

        <li class="imp">
            <img src="{{ asset('assets/svg/SVG/printer-text.svg') }}" alt="">Imprimer
            <ul>
                <li> <img src="{{ asset('assets/svg/SVG/minus.svg') }}" alt="">Ordonnance</li>
                <li> <img src="{{ asset('assets/svg/SVG/minus.svg') }}" alt="">Rapport</li>
            </ul>
        </li>
    </ul>
</div>
@yield('main')
<section>
@endsection
