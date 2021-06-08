@extends('layouts.admin')
@section('title')
Les prix bas !
@stop

@section('stylesheets')
@stop

@section('head_javascripts')
@stop

@php
@endphp

@section('children')
<div class="container">
    <h2 class="text-center my-5">
        Ajouter un produit
    </h2>
    <form method="POST" action="{{ route('products_man.store') }}">
        @csrf
        <div class="col-12">
            <div class="form-group">
                <label>Nom</label>
                <input type="text" name="name" class="form-control" placeholder="Nom du produit" />
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control w-100" placeholder="Décrivez le produit en un paragraphe de 1000 caractères maximum"></textarea>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label>Compléments d'information (liste énumérée)</label>
                <textarea name="more_infos" class="form-control w-100" placeholder="Entrez de petites phrases séparées par des point-virgules"></textarea>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label>Prix</label>
                <input type="text" name="price" class="form-control" placeholder="0,00" />
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label>Marque</label>
                <select name="brand" class="form-control" >
                @foreach($brands as $brand)
                    <option value="{{ $brand->id }}">
                        {{ $brand->name }}
                    </option>
                @endforeach
                </select>
            </div>
        </div>
        <div class="col-12">
            <div class="d-flex justify-content-center mb-5">
                <button type="submit" class="btn btn-primary">Valider</button>
            </div>
        </div>
    </form>
</div>
@stop