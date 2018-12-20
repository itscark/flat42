@extends('layouts.master')

@section('pageTitle', 'Events')

@section('content')

{{--    <div>
        <a class="btn btn-outline-dark" href="{{ route('event.index') }}"> <i class="fas fa-chevron-left"></i> back</a>
    </div>--}}
    <div class="mt-3 mb-3">
        <h1>Event erstellen</h1>
    </div>

    <create-event></create-event>

@endsection
