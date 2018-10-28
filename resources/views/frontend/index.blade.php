@extends('frontend.layouts.master')

@section('pageTitle', 'flat42')

@section('content')
    <div class="hero-section-wrapper">
        <div class="hero-section">
            <div class="hero-top">
                @svg('logo', 'hero-icon')
                <h1>flat42</h1>
            </div>
        </div>
    </div>

    <div class="content-wrapper">
        <div class="blockquote-wrapper">
            <h2>the answer of living together</h2>

            <blockquote cite="http://www.worldwildlife.org/who/index.html">
                For 50 years, WWF has been protecting the future of nature. The world's leading conservation
                organization,
                WWF works in 100 countries and is supported by 1.2 million members in the United States and close to 5
                million globally.
            </blockquote>
        </div>

        <div class="articles-wrapper">
            <article class="event-wrapper article-wrapper">
                <img class="article-img" src="{{ asset(('/images/articles/event.jpg')) }}" alt="events">

                <div class="article-detail-wrapper">
                    @svg('event', 'article-icon')
                    <h2>Events</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat.</p>

                </div>
            </article>

            <article class="shopping-wrapper article-wrapper">
                <img class="article-img" src="{{ asset(('/images/articles/shopping.jpg')) }}" alt="shopping cart">

                <div class="article-detail-wrapper">
                    @svg('checklist', 'article-icon')
                    <h2>News</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat.</p>

                </div>
            </article>

            <article class="news-wrapper article-wrapper">
                <img class="article-img" src="{{ asset(('/images/articles/news.jpg')) }}" alt="news paper">

                <div class="article-detail-wrapper">
                    @svg('newspaper', 'article-icon')
                    <h2>Einkaufsliste</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat.</p>

                </div>
            </article>

            <article class="cleaning-wrapper article-wrapper">
                <img class="article-img" src="{{ asset(('/images/articles/cleaning.jpg')) }}" alt="cleaning the ground">

                <div class="article-detail-wrapper">
                    @svg('duster', 'article-icon')
                    <h2>Einkaufsliste</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat.</p>

                </div>
            </article>
        </div>
    </div>
@endsection
