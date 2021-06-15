@extends('layouts.login')

@section('page_title', 'Admin Reset Password')
@section('form_title', 'We will send you a new password.')

@section('content')
<form action="{{ route('admin.send.password') }}" method="POST">
    @csrf
    <!-- BEGIN USER NAME INPUT -->
    <fieldset class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fas fa-envelope"></i></span>
            </div>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email') ?? 'admin@app.com' }}" autofocus required placeholder="Type your email..."
                autocomplete="off">
        </div>
        @error('email')
        <span class="invalid-feedback" role="alert"> <strong> {{ $message }}
            </strong> </span>
        @enderror
    </fieldset>
    <!-- END USER NAME INPUT -->

    <button type="submit" class="btn btn-info btn-lg btn-block">
        <i class="fas fa-unlock-alt"></i> Send New Password
    </button>
</form>

<!-- BEGIN OPTIONS INPUT -->
<div class="card-footer border-0">
    <p class="float-sm-left text-center">
        <a href="{{ route('admin.show.login') }}" class="card-link">Login</a>
    </p>
</div>
<!-- END OPTIONS INPUT -->
@endsection
