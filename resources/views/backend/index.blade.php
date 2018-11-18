@extends('layouts.master')

@section('pageTitle', 'Home')

@section('content')

    <h2 class="mt-4 mb-4">Was gibt es neues?</h2>

    <add-status></add-status>
    @include('layouts.errors')

    @foreach( $news as $new)
        <statuses :news="{{$new}}"></statuses>
    @endforeach
@endsection
