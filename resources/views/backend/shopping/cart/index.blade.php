@extends('layouts.master')
@section('pageTitle', 'Cart')
@section('content')
    <cart :cart_items="{{ $cart_items }}"></cart>

@endsection