@extends('backend.layouts.master')

@section('content')
    {{--<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        You are logged in!
                    </div>
                </div>
            </div>
        </div>
    </div>--}}

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
