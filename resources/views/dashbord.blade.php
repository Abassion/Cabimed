
@extends('layouts.home')

@section('main')


    <div class="dashbord-main grey lighten-5">
           <div class="infos">
                <div class="information">
                 <div class="image">
                   <img src="assets/svg/SVG/patient.svg" alt="">
                 </div>
                 <div class="text">
                 <div class="title">
                     Patients
                 </div>
                 <div class="value">
                        @if( count($patients) > 9 ) 
                           {{  count($patients) }}
                        @else 
                           {{ '0'. count($patients) }}
                        @endif

                 </div> 
                 </div>
                </div>
                <div class="information">
                 <div class="image mr-3">
                   <img src="assets/svg/SVG/calendar.svg" alt="">
                 </div>
                 <div class="text">
                 <div class="title">
                     Aujourd'hui 
                 </div>
                 <div class="value date">
                    <?php echo date("d M ,Y")?> 
                 </div>
                 </div>
                </div>
                <div class="information">
                 <div class="image">
                   <img src="assets/svg/SVG/medical-appointment.svg" alt="">
                 </div>
                 <div class="text">
                 <div class="title">
                     RDV. AJ.
                 </div>
                 <div class="value">
                     04
                 </div>
                 </div>

                </div>
           </div>
           {{-- <vue-form v-if="show" @update="show = false"></vue-form> --}}

           <patients :facteur="facteur">

            
           </patients>
       
    
    </div>
@stop
