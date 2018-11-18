@extends('layouts.master')

@section('pageTitle', 'Events')

@section('content')
        <div class="row align-items-center mb-4">
            <h1>Events</h1>
            <div class="ml-auto">
                <a class=" btn btn-outline-success" href="{{ route('event.create') }}"><i class="fas fa-plus"></i> Event
                    erstellen</a>
            </div>
        </div>

        @foreach( $events as $event)
            <div class="grid-wrapper align-items-center mb-4">
                <div class="item-left">
                    <p>hosted by {{ $event->user->name }}</p>
                    <p class="date">{{ date('d.m.y', strtotime($event->date)) }}</p>
                </div>
                <div class="item-middle">
                    <h2>{{ $event->title }}</h2>
                    <p>{{ $event->body }}</p>
                </div>

                @if(auth()->id() == $event->user->id)
                    <div class="item-right">
                        <div>
                            <a class="btn btn-outline-secondary" href="{{ route('event.edit', $event->id) }}"><i class="far fa-edit"></i> Edit</a>
                        </div>
                        <div>
                            <form action="{{ route('event.destroy', $event->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-outline-danger" onclick="return confirm('Are you sure?')" type="submit"><i class="far fa-trash-alt"></i> Event absagen</button>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="item-right">
                        <div class="">
                            <form action="" method="post">
                                <button class="btn btn-outline-primary" type="submit"><i class="far fa-calendar-plus"></i> Join
                                    the
                                    event
                                </button>
                            </form>
                        </div>
                    </div>
                @endif


            </div>
            <div class="row">

            </div>
        @endforeach


@endsection
