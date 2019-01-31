@extends('layouts.master')
@section('pageTitle', 'Login')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{ route('login') }}">

                @csrf

                <div class="w-100 text-center">
                    <img class="mb-4 mx-auto login-logo" src="{{ asset('images/transparent-logo.png') }}"
                         alt="flat42 logo">
                </div>
                <div>
                    <h2 class="justify-content-center col">{{ __('Login') }}</h2>
                    <div class="form-group">
                        <label for="email" class="col">{{ __('E-Mail Address') }}</label>
                        <div class="col">
                            <input id="email" type="email"
                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                   value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="col">{{ __('Password') }}</label>

                        <div class="col">
                            <input id="password" type="password"
                                   class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                   name="password"
                                   required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember"
                                       id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Eingeloggt bleiben') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-0">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-sign-in-alt"></i> Login
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
