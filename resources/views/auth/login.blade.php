@extends('layouts.login')

@section('content')
<form class="login100-form validate-form flex-sb flex-w" method="POST" action="{{ route('login') }}">
    @csrf

   {{--  <span class="login100-form-title p-b-53">
        Se connecter avec :
    </span>

    <a href="#" class="btn-face m-b-20">
        <i class="fa fa-facebook-official"></i>
        Facebook
    </a>

    <a href="#" class="btn-google m-b-20">
        <img src="{{asset('Login')}}/images/icons/icon-google.png" alt="GOOGLE">
        Google
    </a>
     --}}
    <div class="p-t-31 p-b-9">
        <span class="txt1">
            Email
        </span>
    </div>
    <div class="wrap-input100 validate-input">
        <input id="email" type="pseudo" class="input100 form-control @error('pseudo') is-invalid @enderror" name="email" value="{{ old('pseudo') }}" required autocomplete="pseudo" autofocus>
        <span class="focus-input100"></span>
    </div>
    
    <div class="p-t-13 p-b-9">
        <span class="txt1">
            Mot de passe
        </span>

        @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                Oublié ?
            </a>
        @endif

    </div>

    <div class="wrap-input100 validate-input password-toggle" data-validate = "Password is required">
        <input id="password" type="password" class="input100 input-text password form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        <span class="toggle-icon" onclick="togglePasswordVisibility()">&#128065;</span>
        <span class="focus-input100"></span>
    </div>

    <div class="container-login100-form-btn txt2" style="margin-left: 30px">
        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> &nbsp; <label for="remember">Rester connecté</label>
    </div>
    <div class="container-login100-form-btn m-t-17">
        <button class="login100-form-btn">
            Se connecter
        </button>
    </div>
    


    <div class="w-full text-center p-t-55">
        <span class="txt2">
            Pas de compte?
        </span>

        <a href="{{ route('inscriptionOrga') }}" class="txt2 bo1">
            s'inscrire maintenant
        </a>
    </div>
</form>
<style>
    .toggle-icon {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    font-size: 24px;
  }
  
</style>
<script>
    function togglePasswordVisibility() {
	const passwordInput = document.getElementById('password');
	const icon = document.querySelector('.toggle-icon');
  
	if (passwordInput.type === 'password') {
	  passwordInput.type = 'text';
	  icon.innerHTML = '&#128064;'; // Show eye-slash icon
	} else {
	  passwordInput.type = 'password';
	  icon.innerHTML = '&#128065;'; // Show eye icon
	}
  }
   </script>
@endsection
