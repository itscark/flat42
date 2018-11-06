@extends('backend.layouts.master')

@section('pageTitle', 'Home')

@section('content')
    <div>
        <form action="{{ route('news.store') }}" method="post">
            @csrf
            <div>
                <label for="title">title</label>
                <input type="text" name="title" id="title">
            </div>
            <div>
                <label for="body">Schreib etwas nettes</label>
                <textarea name="body" id="body" placeholder="Poste etwas neues"></textarea>
            </div>
            <div>
                <button type="submit">News Posten</button>
            </div>

        </form>

        @include('backend.layouts.errors')

    </div>


    <div>
        @foreach( $news as $new)
            <div>
                <p>{{ $new->title }} by {{ $new->user->name }}</p>
                <p>{{ $new->body }}</p>
            </div>
        @endforeach
    </div>

@endsection
