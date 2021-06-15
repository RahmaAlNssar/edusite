@extends('layouts.auth')

@section('page_title', 'Register')
@section('form_title', 'Register with ' . config('app.name'))

@section('content')
<form action="{{ route('register') }}" method="POST">
    @csrf

    <!-- BEGIN USER NAME INPUT -->
    <fieldset class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-user"></i></span>
            </div>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name') ?? 'admin' }}" autofocus required placeholder="Type your name..."
                autocomplete="name">
        </div>
        @error('name')
        <span class="invalid-feedback" role="alert"> <strong> {{ $message }} </strong> </span>
        @enderror
    </fieldset>
    <!-- END USER NAME INPUT -->

    <!-- BEGIN USER EMAIL INPUT -->
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
    <!-- END USER EMAIL INPUT -->

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

    <!-- BEGIN USER PASSWORD CONFIRMATION INPUT -->
    <fieldset class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fas fa-eye-slash toggle-password"></i>
                </span>
            </div>
            <input type="password" name="password_confirmation" value="{{ old('password_confirmation') ?? 123 }}"
                required autocomplete="current-password" placeholder="Type your password confirmation..."
                class="form-control @error('password_confirmation') is-invalid @enderror">
        </div>
        @error('password_confirmation')
        <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
        @enderror
    </fieldset>
    <!-- END USER PASSWORD CONFIRMATION INPUT -->

    <button type="submit" class="btn btn-info btn-lg btn-block"><i class="fas fa-unlock-alt"></i> Register</button>
</form>

<p class="text-center">Already have an account ? <a href="{{ route('login') }}" class="card-link">Login</a></p>
@endsection
