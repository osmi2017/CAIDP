@extends('layouts.login')

@section('content')
<form class="login100-form validate-form flex-sb flex-w"  method="POST" action="{{ route('password.email') }}">
    @csrf
    <span class="login100-form-title p-b-53">
        Mot de passe oublié
    </span>
    
    <div class="p-t-31 p-b-9">
        <span class="txt1">
            Email
        </span>
    </div>
    <div class="wrap-input100 validate-input">
       <input id="email" type="email" class="input100 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <span class="focus-input100"></span>
    </div>

    <div class="container-login100-form-btn m-t-17">
        <button type="submit" class="login100-form-btn">
            Envoyez 
        </button>
    </div>
    

</form>
@endsection


