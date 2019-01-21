@extends('layouts.master')

@section('pageTitle', 'Admin Page')

@section('content')
<admin-page :users="{{$users}}" :flats="{{$flat}}"></admin-page>
@endsection
