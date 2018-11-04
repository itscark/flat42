@extends('backend.layouts.master')

@section('pageTitle', 'Events')

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
                <label for="date">Wann findet es statt</label>
                <input type="date" id="date" name="date">
            </div>

            <div>
                <button type="submit">News Posten</button>
            </div>

        </form>

    </div>
@endsection
