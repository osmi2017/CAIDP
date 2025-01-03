@extends('layouts.login')

@section('content')

<form method="POST" action="{{ route('password.update') }}">
    @csrf

    <input type="hidden" name="token" value="{{ $token }}">
    <div class="p-t-31 p-b-9">
        <span class="txt1">
            Email
        </span>
    </div>
    <div class="wrap-input100 validate-input">
        <input id="email" type="email" class="input100 form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
        <span class="focus-input100"></span>
    </div>
    <div class="p-t-31 p-b-9">
        <span class="txt1">
            Mot de passe
        </span>
    </div>
    <div class="wrap-input100 validate-input">
        <input id="password" type="password" class="input100 form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
        <span class="focus-input100"></span>
    </div>

<div class="p-t-31 p-b-9">
        <span class="txt1">
            Confirmer mot de passe
        </span>
    </div>
    <div class="wrap-input100 validate-input">
        <input id="password-confirm" type="password" class="input100 form-control" name="password_confirmation" required autocomplete="new-password">
        <span class="focus-input100"></span>
    </div>

    <div class="container-login100-form-btn m-t-17">
        <button class="login100-form-btn" type="submit" >
            Réïnitialiser
        </button>
    </div>
</form>
@endsection
