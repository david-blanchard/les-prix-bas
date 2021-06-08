@extends('layouts.app')
@section('title')
Les prix bas !
@stop

@section('stylesheets')
    <link rel="stylesheet" href="/css/index.css" />
@stop

@section('head_javascripts')
@stop

@section('children')
    @include('product_info.breadcrumb')

    @include('product_info.index')
@stop

@section('body_javascripts')
    <script src="/js/product-page.js" ></script>
@stop