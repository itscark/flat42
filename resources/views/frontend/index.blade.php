@extends('layouts.master')

@section('pageTitle', 'flat42')

@section('content')


    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
        <div class="col-md-5 p-lg-5 mx-auto my-5 hero">
            <h1 class="display-4 font-weight-normal">flat42</h1>
            <p class="lead font-weight-normal">The answer of living together.</p>
            <a class="btn btn-outline-secondary" href="{{ route('register') }}">Join us now!</a>
        </div>

        <svg class="hero-svg">
            <use xlink:href="svg/icons.svg#logo"></use>
        </svg>

        <svg class="hero-svg-shadow">
            <use xlink:href="svg/icons.svg#logo"></use>
        </svg>
        <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
    </div>

    <div class="container marketing">

        <feature_left :content="{{$welcome[0]}}"></feature_left>

        <feature_right :content="{{$welcome[1]}}"></feature_right>

        <feature_left :content="{{$welcome[2]}}"></feature_left>

        <feature_right :content="{{$welcome[3]}}"></feature_right>

    </div>

    {{--  <div class="content-wrapper">

          <div class="articles-wrapper">
              <article class="event-wrapper article-wrapper">
                  <img class="article-img" src="{{ asset(('/images/articles/event.jpg')) }}" alt="events">

                  <div class="article-detail-wrapper">
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
      </div>--}}
@endsection
