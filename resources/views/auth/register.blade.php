@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">


            <form method="POST" action="{{ route('register') }}">
                <h2 class="justify-content-center">{{ __('Register') }}</h2>
                @csrf

                <div class="form-group">
                    <label for="name">{{ __('Name') }}</label>

                    <div>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                               name="name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>


                <div class="form-group">
                    <label for="flat_id">{{ __('Flat ID') }}</label>

                    <div>
                        <input id="flat_id" type="text"
                               class="form-control{{ $errors->has('flat_id') ? ' is-invalid' : '' }}" name="flat_id"
                               value="{{ old('flat_id') }}" required>

                        @if ($errors->has('flat_id'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('flat_id') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">{{ __('E-Mail Address') }}</label>

                    <div >
                        <input id="email" type="email"
                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                               value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group ">
                    <label for="password" >{{ __('Password') }}</label>

                    <div>
                        <input id="password" type="password"
                               class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                               required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="password-confirm"
                          >{{ __('Confirm Password') }}</label>

                    <div class="">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                               required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
                </div>
            </form>
        </div>
    </div>

@endsection
