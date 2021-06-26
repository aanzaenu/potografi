@extends('layouts.master')

@section('content')
<div class="nk-main">
    <div id="top">
        <div class="nk-gap-6"></div>
        <div class="nk-gap"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <h1 class="h2 text-center">Login</h1>  
                </div>
            </div>
        </div>
        <div class="nk-gap-2"></div>
    </div>
    <div id="login" class="mb-30">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="d-block w-100 py-4">
                        <form method="POST" action="{{ route('login') }}" class="nk-form">
                            @csrf
    
                            <div class="form-group">
                                <label for="email" class="text-md-right">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control required @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Anda">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="form-group">
                                <label for="password" class="text-md-right">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control required @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password Anda">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="form-group">
                                <div class="d-block w-100">
                                    @if (Route::has('password.request'))
                                        <a class="" href="{{ route('password.request') }}">
                                            {{ __('Lupa Password Anda?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="nk-btn nk-btn-color-dark-1 mx-1">
                                            {{ __('Login') }}
                                        </button>
                                        <a href="{{ route('register') }}" class="nk-btn nk-btn-color-light-1 mx-1">
                                            {{ __('Register') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
