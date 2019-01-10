@extends('layouts.master')

@section('pageTitle', 'Cleaning')

@section('content')
    <cleaning :period="{{$period}}"></cleaning>
@endsection
