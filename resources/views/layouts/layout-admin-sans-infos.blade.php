@extends('layouts.app')
@section('content')
<v-app>
<header class="dashbord-header">
    <div class="dashbord">
        <a href="{{ route('dashbord') }}">
            Dashbord
        </a>
    </div>
    <div class="panel">
        <div class="logo_utilisateur">
        <img src="{{ Auth::user()->image }}" alt="">
        </div>
        <div class="nom">
           {{ Auth::user()->username }}
        </div>
        <form id="frm-logout" action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="deconnexion btn">
               Déconnexion
            </button>
        </form>
        
    </div>
</header>
<div class="side-bar">
    <ul>
        <li> 
        <a href="{{ route('dashbord') }}">
            <div class="content">
                <svg class="sidebar-svg">
                    <use xlink:href="{{ asset('/assets/svg/SVG/sidebar.svg') }}#icon-home"></use>
                </svg>
                <span>Home</span>
            </div>
        </a>
        </li>
        <li> 
            <a href="{{ route('rendez-vous-page') }}">
                <div class="content">
                    <svg class="sidebar-svg">
                        <use xlink:href="{{ asset('/assets/svg/SVG/sidebar.svg') }}#icon-calendar"></use>
                    </svg>
                    <span>Rendez-vous</span>
                </div>
            </a>
        </li>
        @if( Auth::user()->email == 'medecin@email.com' )
        <li class="imp">
            <div class="content">
                <svg class="sidebar-svg">
                    <use xlink:href="{{ asset('/assets/svg/SVG/sidebar.svg') }}#icon-printer"></use>
                </svg>
                <span>Imprimer</span>
            </div>
            <ul>
                <a href="{{ route('ordonnance.create') }}">
                <li>
                    <div class="content">
                        <img src="{{ asset('assets/svg/SVG/minus.svg') }}" alt="">Ordonnance
                    </div>
                </li>
                </a>
                <a href="{{ route('rapport.create') }}">
                <li>
                    <div class="content">
                        <img src="{{ asset('assets/svg/SVG/minus.svg') }}" alt="">Rapport
                    </div>
                </li> 
                </a>
            </ul>
        </li>
        @endif
        @if( Route::currentRouteName() == 'dashbord' )
        <li> 
            <div class="content" @click="showRecherche()">
                <svg class="sidebar-svg">
                    <use xlink:href="{{ asset('/assets/svg/SVG/sidebar.svg') }}#icon-search"></use>
                </svg>
                <span>Rechercher</span>
            </div>
        </li>
        <li> 
            <div class="content">
                <svg class="sidebar-svg">
                    <use xlink:href="{{ asset('/assets/svg/SVG/sidebar.svg') }}#icon-list-ol"></use>
                </svg>
                <span>Trier</span>
            </div>
            <ul class="tri">
                <li @click="trier('nom')">
                    <div class="content">
                        <img src="{{ asset('assets/svg/SVG/minus.svg') }}" alt="">
                       Nom
                    </div>
                </li>
                <li @click="trier('date_naissance')">
                    <div class="content">
                        <img src="{{ asset('assets/svg/SVG/minus.svg') }}" alt=""><span>Date de naissance</span>
                    </div>
                </li>
            </ul>
        </li>
        @endif
    </ul>
    <div class="nouveau">
        <a class="btn" href="{{ route('patient.create') }}">
            <img src="{{ asset('assets/svg/SVG/user-plus.svg') }}" alt="">
            <span>nouveau </span>
        </a>
    </div>
</div>
<section class="main" >
    <div class="dashbord-main grey lighten-5"> 
       @yield('main')
    </div> 
</section>
</v-app> 
@stop

