@extends('layouts.master')

@section('pageTitle', 'flat42')

@section('content')
    <div class="blog-hero-img">
        <h1>Blog</h1>
    </div>
    <div class="blog-wrapper">
        <section class="content-wrapper">
            <div class="articles-wrapper">
                <article class="event-wrapper article-wrapper">
                    <img class="article-img" src="{{ asset(('/images/articles/event.jpg')) }}" alt="events">

                    <div class="article-detail-wrapper">
                        <h3>Events</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                            incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                            ullamco
                            laboris nisi ut aliquip ex ea commodo consequat.</p>
                        <a href="">read more</a>

                    </div>
                </article>
            </div>
        </section>

        @include('layouts.aside')
    </div>
@endsection
