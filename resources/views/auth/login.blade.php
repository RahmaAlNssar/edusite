@extends('layouts.auth')

@section('page_title', 'Login')
@section('form_title', 'Login with ' . config('app.name'))

@section('content')
<form action="{{ route('login') }}" method="POST">
    @csrf
    <!-- BEGIN USER NAME INPUT -->
    <fieldset class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-envelope"></i></span>
            </div>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email') ?? 'admin@app.com' }}" autofocus required placeholder="Type your email..."
                autocomplete="email">
        </div>
        @error('email')
        <span class="invalid-feedback" role="alert"> <strong> {{ $message }} </strong> </span>
        @enderror
    </fieldset>
    <!-- END USER NAME INPUT -->

    <!-- BEGIN USER PASSWORD INPUT -->
    <fieldset class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fas fa-eye-slash toggle-password"></i>
                </span>
            </div>
            <input type="password" name="password" value="{{ old('password') ?? 123 }}" required
                autocomplete="current-password" placeholder="Type your password..."
                class="form-control @error('password') is-invalid @enderror">
        </div>
        @error('password')
        <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
        @enderror
    </fieldset>
    <!-- END USER PASSWORD INPUT -->

    <!-- BEGIN OPTIONS INPUT -->
    <div class="form-group row">
        <div class="col-md-6 col-12 text-center text-md-left">
            <fieldset>
                <input type="checkbox" id="remember-me" class="chk-remember" name="remember"
                    {{ old('remember') ? 'checked' : '' }}>
                <label for="remember-me" class="px-1"> Remember Me</label>
            </fieldset>
        </div>
        @if (Route::has('password.request'))
        <div class="col-md-6 col-12 text-center text-md-right">
            <a href="{{ route('password.request') }}" class="card-link">Forgot Your Password?</a>
        </div>
        @endif
    </div>
    <!-- END OPTIONS INPUT -->

    <button type="submit" class="btn btn-info btn-lg btn-block"><i class="fas fa-unlock-alt"></i> Login</button>
</form>

<p class="text-center">Don't have an account ? <a href="{{ route('register') }}" class="card-link">Register</a></p>
@endsection
