@extends('layouts.app')
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
    {{-- @dump(Auth::user()) --}}
    @include('product_info.main')
@stop

@section('body_javascripts')
@stop