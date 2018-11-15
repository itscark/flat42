@extends('layouts.master')

@section('pageTitle', 'Home')

@section('content')
    <div class="container mt-4">
        <form action="{{ route('news.store') }}" method="post">
            @csrf
            <div class="form-group">
                <h1 for="title">Schlagzeile</h1>
                <input class="form-control" type="text" name="title" id="title">
            </div>
            <div>
                <button class="btn btn-primary" type="submit">News Posten</button>
            </div>

        </form>
        @include('layouts.errors')
    </div>

    <div class="container mt-5">

        <h2 class="mt-4 mb-4">Was gibt es neues?</h2>

        @foreach( $news as $new)
            <div class="grid-wrapper align-items-center">
                <div class="item-left">
                    <p class="date">{{ $new->created_at->toFormattedDateString() }}</p>
                    <p>{{ $new->user->name }} schreibt...</p>
                </div>

                <div class="item-middle">
                    <p>{{ $new->title }}</p>
                </div>
                {{-- Delete Button noch einfügen--}}
            </div>
        @endforeach
    </div>

@endsection
