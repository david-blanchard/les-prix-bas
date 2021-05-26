@extends('header_and_footer.main')
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
    @include('product_page.main')
@stop

@section('body_javascripts')
@stop