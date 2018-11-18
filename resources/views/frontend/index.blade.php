@extends('layouts.master')

@section('pageTitle', 'flat42')

@section('hero-section')
    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
        <div class="col-md-5 p-lg-5 mx-auto my-5 hero">
            <h1 id="flat" class="display-4 font-weight-normal">flat42</h1>
            <p class="lead font-weight-normal">The answer of living together.</p>
            <a class="btn btn-outline-secondary" href="{{ route('register') }}">Join us now!</a>
        </div>

        <svg class="hero-svg">
            <use xlink:href="svg/icons.svg#logo"></use>
        </svg>

        <svg class="hero-svg-shadow">
            <use xlink:href="svg/icons.svg#logo"></use>
        </svg>
        <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
    </div>
@endsection

@section('content')

    <div class="container marketing">

        <feature_left :content="{{$welcome[0]}}"></feature_left>

        <feature_right :content="{{$welcome[1]}}"></feature_right>

        <feature_left :content="{{$welcome[2]}}"></feature_left>

        <feature_right :content="{{$welcome[3]}}"></feature_right>

    </div>


@endsection
