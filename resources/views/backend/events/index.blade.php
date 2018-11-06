@extends('backend.layouts.master')

@section('pageTitle', 'Events')

@section('content')
    <div>
        @foreach( $events as $event)
            <div>
                <p>{{ $event->title }} hosted by {{ $event->user->name }}</p>
                <p>{{ date('d.m.y', strtotime($event->date)) }}</p>
            </div>
            <div>
                <form action="" method="post">
                    <button type="submit">Join the event</button>
                </form>
            </div>

            <a href="{{ route('event.show', $event->id) }}">Event details</a>
        @endforeach
    </div>


    <a href="{{ route('event.create') }}">Event erstellen</a>



@endsection
