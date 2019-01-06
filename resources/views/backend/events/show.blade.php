@extends('layouts.master')

@section('pageTitle', 'Events')

@section('content')

    <div>
        <div>
            <a href="{{ route('event.index') }}">back</a>
        </div>
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


        @if (auth()->id() == $event->user->id)
            <div>
                <form action="{{ route('event.destroy', $event->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit">Event absagen</button>
                </form>
            </div>


        @endif
    </div>



@endsection
