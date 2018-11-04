@extends('backend.layouts.master')

@section('pageTitle', 'Events')

@section('content')
{{--    <div>
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

    </div>--}}


    <div>
        @foreach( $events as $event)
            <div>
                <p>{{ $event->title }} hosted by {{ $event->user->name }}</p>
                <p>{{ date('d.m.y', strtotime($event->date)) }}</p>
                <p>{{ $event->body }}</p>
            </div>
            <div>
                <form action="" method="post">
                    <button type="submit">Join the event</button>
                </form>
            </div>
        @endforeach
    </div>



@endsection
