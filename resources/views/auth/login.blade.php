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
            <input placeholder="Email" id="email" type="email" class=" @error('email') is-invalid @enderror input100" name="email" value="{{ old('email') }}"  autocomplete="email" >
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
            <input placeholder="mot de pass" id="password" type="password" class="input100 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

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
            @if ($errors->any())
            <div class="alert alert-danger" class="mt-3" style="margin-top: 1rem">
            <ul>
            @foreach ($errors->all() as $error)
                <li >Coordonnées incorrect, réessayer s'il-vous plait</li>
            @endforeach
           </ul>
       </div>
       @endif
    </div>
  </div>
</div>

  </div>
</v-app>
</html>
@stop