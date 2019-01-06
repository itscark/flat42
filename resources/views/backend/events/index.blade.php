@extends('layouts.master')

@section('pageTitle', 'Events')

@section('content')
        <events :events="{{$events}}"></events>
@endsection
