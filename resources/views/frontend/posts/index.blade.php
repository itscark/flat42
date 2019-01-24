@extends('layouts.master')

@section('pageTitle', 'flat42')

@section('content')
    <div class="blog-hero-img mb-5">
        <h1>Blog</h1>
    </div>
    <div class="blog-wrapper">
        <section class="content-wrapper">
            <div class="articles-wrapper">
                @foreach($posts as $post)
                    <article class="event-wrapper article-wrapper">
                        <div class="article-detail-wrapper">
                            <h3>{{ $post->title }}</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut
                                labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco
                                laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                        <hr class="mt-4 mb-4">
                    </article>
                @endforeach
            </div>
        </section>
    </div>
@endsection
