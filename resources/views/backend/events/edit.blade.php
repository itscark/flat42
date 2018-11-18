@extends('layouts.master')

@section('pageTitle', 'Events')

@section('content')
        <div>
            <a class="btn btn-outline-dark" href="{{ route('event.index') }}"><i class="fas fa-chevron-left"></i>
                back</a>
        </div>
        <div class="mt-3 mb-3">
            <h1>Event bearbeiten</h1>
        </div>
        <form action="{{ route('event.update', $event->id) }}" method="post">
            @csrf
            <div class="form-group col-md">
                <label for="title">Titel</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
            </div>
            <div class="form-group col-md">
                <label for="body">Schreib etwas nettes!</label>
                <textarea class="form-control" name="body" id="body" placeholder="Beschreibung...">{{ old('body') }}</textarea>
            </div>

            <div class="form-group col-md-4">
                <label for="date">Wann findet es statt</label>
                <input class="form-control" type="date" id="date" name="date" {{--value="{{ old('date', date('yyyy-MM-dd')) }}--}}>
            </div>

            <div class="form-group col-md-4">
                <button class="btn btn-outline-success" type="submit"><i class="far fa-edit"></i> Event updaten</button>
            </div>

        </form>


        @include('layouts.errors')

@endsection
