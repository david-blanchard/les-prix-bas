@extends('layouts.admin')
@section('title')
Les prix bas !
@stop

@section('stylesheets')
    <link rel="stylesheet" href="/css/index.css" />
    <link rel="stylesheet" href="/css/carousel.css" />
@stop

@section('head_javascripts')
@stop

@section('children')
    @dump(Auth::user())
    <div class="container">
        <a class="link-item" href="{{ route('products_man') }}">Gérer les produits</a>
    </div>
@stop

@section('body_javascripts')
@stop