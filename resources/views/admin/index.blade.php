@extends('layouts.master')

@section('pageTitle', 'Admin Page')

@section('content')
<admin-page :users="{{$users}}" :flats="{{$flat}}" :blogs="{{$blog}}"></admin-page>
@endsection
