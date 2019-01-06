@extends('layouts.master')

@section('pageTitle', 'Home')

@section('content')
    @if(count($event))
        <next-event :event="{{$event}}"></next-event>
    @endif
    <statuses :news="{{$news}}"></statuses>
@endsection
