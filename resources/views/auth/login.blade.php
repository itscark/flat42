@extends('layouts.master')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <form class="form-card" method="POST" action="{{ route('login') }}">
                <h2 class="justify-content-center">Login</h2>
                @csrf
                <fieldset class="">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" class="form-control" placeholder="Please fill in your email" type="text"
                               name="email" required/>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" class="form-control" placeholder="Type in your password"
                               type="password" name="password" required/>
                    </div>

                    <div class="form-group form-check">
                        <input class=" form-check-input" type="checkbox" name="remember"
                               id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-element-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </fieldset>


                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
