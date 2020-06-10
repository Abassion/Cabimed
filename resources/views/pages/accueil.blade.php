@extends('layouts.app')
@section('content')
<head>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
</head>
    <body>

        <!-- Start Header Area -->
        <header class="default-header">
            <div class="container">
                <div class="header-wrap">
                    <div class="header-top d-flex justify-content-between align-items-center">
                        <div class="logo">
                            <a href="#home"><img src="{{ asset('assets/logo.png') }}" alt=""></a>
                        </div>
                        <a href="/admin" class="primary-btn  btn-iscr">
                            Connectez-vous
                        </a>
                        <div class="main-menubar d-flex align-items-center">
                            <nav class="hide">
                                <a href="#home">Home</a>
                                <a href="#service">Services</a>
                                <a href="#appoinment">Appoinment</a>
                                <a href="#consultant">Consultants</a>
                            </nav>
                            <div class="menu-bar"><span class="lnr lnr-menu"></span></div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- End Header Area -->
        <v-app>
        <!-- start banner Area -->
        <section class="banner-area relative" id="home">
            <div class="container">
                    <div class="row fullscreen align-items-center justify-content-center text-container">
                        <div class="banner-content col-lg-6 col-md-12">
                        <rdv-create />
                        </div>
                        <div class="col-lg-6 d-flex align-self-end img-right image-container">
                            <img class="img-fluid" src="{{ asset('assets/header.png') }}" alt="">
                        </div>
                    </div>
            </div>
        </section>
        </v-app>
    </body>
@endsection


