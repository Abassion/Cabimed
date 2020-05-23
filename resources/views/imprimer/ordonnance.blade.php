  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">

    <title>Ordonnace</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
    <style>
        html {
            padding: 0;
            margin: 0;
        }
        .blue {
            color: #1b75be; 
        }
        html * {
            font-family: 'Roboto'
        }
        h1 {
            text-align: center;
            color: #1b75be;
            padding: 30px 0 20px 0;
        }
        .text-right {
            text-align: right;
        } 
        hr {
            margin-top: 5px;
            margin-bottom: 5px;
        }
        @font-face {
          font-family: 'Roboto';
           src: url('{{ asset('fonts/Roboto-Light.ttf') }}');
        }
        body {
            margin: 0;
            padding: 0;
            font-family: 'Roboto';
            padding: 50px 0;
        }
        .header {
            background-color: #1b75be;
            color: white;
            padding: 20px 50px;
        }
        .container {
            margin: 0 auto;
        }
        .main {
            /* justify-content: space-between; */
            padding: 0px 80px;
        }
        .left > *,.right > * {
            margin: 1rem 0;
        }
        .main-content {
            margin: 60px 0;
            font-size: 15px;
        }
        .main-content > ul { 
            list-style: none;
            padding-left: 20px;
        }
        
        .main-content > ul > li::before {
          content: "\2022";  /* Add content: \2022 is the CSS Code/unicode for a bullet */
          color: #1b75be; /* Change the color *//* If you want it to be bold */
          display: inline-block; /* Needed to add space between the bullet and the text */
          width: 2em; /* Also needed for space (tweak if needed) */
          font-weight: bold;
          
          transform: translate(15px,1px) scale(1.5);
        }
        .main-content > ul >li { 
            padding: 20px 0;
        }
        .info-patient {

        }
        .info-patient > ul {
            list-style: none;
            width: 54%;
            padding: 0;
        }
        .info-patient > ul > li {
            border-bottom: 1px solid rgb(228, 228, 228);
        }
        .info-patient > ul > li > .keyword {
            color: #1b75be;
            width: 150px;
        }
        .footer {
            padding: 10px 60px;
            background-color: #1b75be;
            color: white;
        }
    </style>
        <body>
            <div class="header">
                <div class="">
                    <div class="row">
                        <div class="header-title col-xs-8">
                            <div class="title-main"  style="font-size: 34px">
                                Cabinet medical Dr.abcd
                            </div>
                            <div class="sub-title">
                                <div class="adresse">
                                        <span><img src="{{ asset('assets/svg/SVG/location.svg') }}" alt="" style="width: 20px;margin-right:10px"></span>  Saida, Algerie
                              
                                </div>
                                <div class="info-web">
                                    <span><img src="{{ asset('assets/svg/SVG/mail.svg') }}" alt="" style="width: 20px;margin-right:10px"></span>
                                     cabinet-medical@email.com
                                </div>
                            </div>
                        </div>
                        <div class="header-logo  col-xs-4">
                          <img src="https://i.ibb.co/p49CY0D/patient.png" style="width: 120px" alt="patient" border="0">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row text-center" style="font-size: 40px; color: #1b75be">Ordonnace</div>
            <div class="main">
                <hr>
                <div class="section-info">
                    <div class="row">
                        <div class="left col-xs-6">
                            <div class="doctor">
                                Dr.Meskine Hassan
                            </div>
                            <div class="specialite">
                                Medecin Generale
                            </div>
                            <div class="private-num">
                                <span><img src="{{ asset('assets/svg/SVG/phone.svg') }}" alt="" style="width: 20px;margin-right:10px"></span>+213 559-22-18-27
                            </div>
                        </div>
                        <div class="right col-xs-6">
                            <div class="presc">Prescription no.: [38108N00]</div>
                            <div class="date">Date : 23/05/2020</div>
                        </div>
                    </div>
                
                </div>
                <hr>
                <div class="main-content text-bold">
                    <div>
                        <span style="font-size: 20px;margin-bottom: 10px" class="blue">Traitement : </span>
                    </div>
                   <ul>
                       @foreach ($meds as $med)
                       <li>
                        @foreach ($med as $m)
                         {{$m}}   
                        @endforeach
                       </li>
                       @endforeach
                   </ul>
                </div>
                <div class="info-patient" >
                    <span style="font-size: 20px ;margin-bottom: 10px" class="blue">pour : </span>
                    <ul>
                        <li class="row" style="padding-bottom: 8px">
                            <div class="keyword col-xs-2">Mr./MS/Mrs.</div>
                            <div class="value col-xs-10"> [jefferey S.Brown]</div>
                        </li>
                        <li class="row" style="padding-bottom: 8px">
                            <div class="keyword col-xs-2">age:</div>
                            <div class="value col-xs-10"> 22</div>
                        </li>
                        <li class="row" style="padding-bottom: 8px">
                            <div class="keyword col-xs-2">Adresse:</div>
                            <div class="value col-xs-10">Matthew Rd, Bestal ,NT 135 USA</div>
                        </li>
                        <li class="row" style="padding-bottom: 8px">
                            <div class="keyword col-xs-3">Contact Num:</div>
                            <div class="value col-xs-10">[320-988-3840]</div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row" style="padding: 20px 0px 150px 0px">
                <div class="col-xs-8"></div>
                <div class="col-xs-4">
                    Signature
                </div>
            </div>
            <div class="footer row">
                <div class="telephone col-xs-6">
                    <span><img src="{{ asset('assets/svg/SVG/phone-call.svg') }}" alt="" style="width: 20px"></span>
                     +(213)787878787
                </div>
                <div class="email col-xs-6">
                    <span> 
                    </span>
                    <span>  <span><img src="{{ asset('assets/svg/SVG/mail.svg') }}" alt="" style="width: 20px;margin-right:10px"></span>cabinet-medical@email.com</span>
                </div>
            </div>
        </body>
    </html>
