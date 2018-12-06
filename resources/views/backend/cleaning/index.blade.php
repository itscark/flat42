@extends('layouts.master')

@section('pageTitle', 'Cleaning')

@section('content')

    <h1>Cleaning</h1>

    <cleaning></cleaning>


    <a href="{{ route('cleaning.pdf') }}" target="_blank" class="btn btn-outline-primary">Download</a>


@endsection
