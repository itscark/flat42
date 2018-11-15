@extends('layouts.master')

@section('pageTitle', 'Events')

@section('content')
    <div class="container mt-4">

        <div>
            <a class="btn btn-outline-dark" href="{{ route('event.index') }}"> <i class="fas fa-chevron-left"></i> back</a>
        </div>
<div class="mt-3 mb-3">
    <h1>Event erstellen</h1>
</div>

        <form action="{{ route('event.store') }}" method="post">
            @csrf
            <div class="form-group col-md">
                <label for="title">Titel</label>
                <input class="form-control" type="text" name="title" id="title" value="{{ old('title') }}">
            </div>
            <div class="form-group col-md">
                <label for="body">Schreib etwas nettes</label>
                <textarea class="form-control" name="body" id="body" placeholder="Poste etwas neues">{{ old('body') }}</textarea>
            </div>

            <div class="form-group col-md-4">
                <label for="date">Wann findet es statt</label>
                <input class="form-control" type="date" id="date" name="date" {{--value="{{ old('date', date('yyyy-MM-dd')) }}--}}>
            </div>

            <div class="col-md">
                <button class="btn btn-outline-success" type="submit"><i class="fas fa-plus"></i> Event planen</button>
            </div>

        </form>


        @include('layouts.errors')

    </div>
@endsection
