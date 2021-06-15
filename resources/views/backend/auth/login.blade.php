@extends('layouts.login')

@section('page_title', 'Admin Login')
@section('form_title', 'Login with ' . config('app.name'))

@section('content')
<form action="{{ route('admin.login') }}" method="POST">
    @csrf
    <!-- BEGIN USER NAME INPUT -->
    <fieldset class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-user"></i></span>
            </div>
            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                value="{{ old('username') ?? 'admin' }}" autofocus required placeholder="Type your name..."
                autocomplete="off">
        </div>
        @error('username')
        <span class="invalid-feedback" role="alert"> <strong> {{ $message }}
            </strong> </span>
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
                placeholder="Type your password..." class="form-control form-control-lg input-lg">
        </div>
    </fieldset>
    <!-- END USER PASSWORD INPUT -->

    <!-- BEGIN OPTIONS INPUT -->
    <div class="form-group row">
        <div class="col-md-6 col-12 text-center text-md-left">
            <fieldset>
                <input type="checkbox" id="remember-me" class="chk-remember">
                <label for="remember-me" class="px-1"> Remember Me</label>
            </fieldset>
        </div>
        <div class="col-md-6 col-12 text-center text-md-right">
            <a href="{{ route('admin.forgot.password') }}" class="card-link">Forgot Password?</a>
        </div>
    </div>
    <!-- END OPTIONS INPUT -->

    <button type="submit" class="btn btn-info btn-lg btn-block"><i class="fas fa-unlock-alt"></i> Login</button>
</form>
@endsection
