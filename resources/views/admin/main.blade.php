@extends('layouts.admin')
@section('title')
Les prix bas !
@stop

@section('stylesheets')
@stop

@section('head_javascripts')
@stop

@section('children')
    {{-- @include('admin.breadcrumb') --}}
    <div class="container">
        @dump(Auth::user())

    </div>
@stop

@section('body_javascripts')
@stop