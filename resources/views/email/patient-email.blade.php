<body>
    <div class="container">
        <div class="logo">
            <img src="{{ asset('https://i.ibb.co/bzDBH5c/logo.png') }}" alt="">
        </div>
        <div class="text">
            Salut @if( $patient->gendre == 'Male' )  Mr.  @else Mdm.  @endif  {{ $patient->nom.' '.$patient->prenom }},
            <br />
            {{ $contenu }}
            <br />
            Prends soin de toi, Merci.
        </div>
    </div>
</body>

