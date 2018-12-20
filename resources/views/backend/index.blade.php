@extends('layouts.master')

@section('pageTitle', 'Home')

@section('content')

    @if(count($event))
        <h3>Geplante Events</h3>
        <next-event :event="{{$event}}"></next-event>
    @endif

    <h3 class="mt-4 mb-4">Was gibt es neues?</h3>

    <statuses :news="{{$news}}"></statuses>

    {{--    @foreach( $news as $new)
            <statuses :news="{{$new}}"></statuses>
        @endforeach--}}
@endsection
