
@extends('layouts.app')

@section('content')
<body>
        <v-app>
<div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <div class="login100-pic js-tilt" data-tilt="">
          <img src="assets/doctor.jpg" alt="IMG" />
        </div>
        <div class="login100-form validate-form">
          <span class="login100-form-title">Connectez-vous</span>
          <form method="POST" action="{{ route('login') }}">
            @csrf
            <div
              class="wrap-input100 validate-input mb-5"
              data-validate="Valid email is required: ex@abc.xyz"
            >
            <input id="email" type="email" class=" @error('email') is-invalid @enderror input100" name="email" value="{{ old('email') }}"  autocomplete="email" >
            <span class="focus-input100"></span
              ><span class="symbol-input100">
                <svg>
                  <use xlink:href="assets/svg/symbol-defs.svg#icon-mail"></use>
                </svg>
              </span>
            </div>
            <div
              class="wrap-input100 validate-input"
              data-validate="Password is required"
            >
            <input id="password" type="password" class="input100 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
              @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
               @enderror
              <span class="focus-input100"></span
              ><span class="symbol-input100">
                <svg>
                  <use
                    xlink:href="assets/svg/symbol-defs.svg#icon-key"
                  ></use></svg>
            </span>
            </div>
            <div class="container-login100-form-btn">
              <input type="submit" name="submit" value="Connecter" class="login100-form-btn" value="Login">
            </div>
            </form>
          {{-- <form method="POST" action="{{ route('login') }}">
            @csrf
          <div
            class="wrap-input100 validate-input mb-5"
            data-validate="Valid email is required: ex@abc.xyz"
          >
      
                   <span class="focus-input100"></span
            ><span class="symbol-input100">
              <svg>
                <use xlink:href="assets/svg/symbol-defs.svg#icon-mail"></use>
              </svg>
            </span>
          </div>
          
          <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="col-md-6">
              
            </div>
            <svg>
                <use
                  xlink:href="assets/svg/symbol-defs.svg#icon-key"
             ></use></svg>
        </div>
 
             
          </span>
          </div>
          <div class="container-login100-form-btn">
            <input type="submit" name="submit" value="Connecter" class="login100-form-btn" value="Login">
          </div>
          </form> --}}

        </div>
      </div>
    </div>
  </div>
</v-app>
</html>
@stop