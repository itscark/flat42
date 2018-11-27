@extends('layouts.master')

@section('pageTitle', 'Home')

@section('content')

    <h2 class="mt-4 mb-4">Was gibt es neues?</h2>

    <add-status></add-status>
    @include('layouts.errors')

    @if( !count($news))
        <div class="text-center m-5">
            <img class="no_soup mx-auto" src="{{ asset('svg/no_soup.svg') }}" alt="Kiwi standing on oval">
        </div>
    @else
        <div class="mx-auto">
            @foreach( $news as $new)
                <statuses :news="{{$new}}"></statuses>
            @endforeach
        </div>
    @endif
@endsection
