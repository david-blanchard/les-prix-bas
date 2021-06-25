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
        Produits
        <a href="{{ route('products_man.create') }}" class="btn btn-outline-primary" alt="Créer" title="Créer">
            <i class="fa fa-edit" aria-hidden="true"></i>
        </a>
    </h2>
    <table class="table table-striped table-hover table-sm">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom</th>
                <th scope="col">Description</th>
                <th scope="col">Détails</th>
                <th scope="col">Prix</th>
                <th scope="col">Marque</th>
                <th scope="col">
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $item)
            <tr>
                <th>
                    <a href="{{ route('products_man.edit', $item->id) }}" class="btn btn-outline-warning" alt="Editer {{ $item->id }}" title="Editer {{ $item->id }}">
                        <i class="fa fa-edit" aria-hidden="true"></i>
                    </a>
                </th>
                <td>
                    <a href="{{ route("product", $item->slug) }}" title="Tester le produit" >
                    {{ $item->name }}
                    </a>
                </td>
                <td>
                    <a href="{{ route("product", $item->slug) }}" title="Tester le produit" >
                    {{ $item->description }}
                    </a>
                </td>
                @php
                    $infos = explode(';', $item->more_infos);
                @endphp
                <td>
                    <ul>
                    @foreach($infos as $detail) 
                    <li>
                        {{ $detail }}
                    </li>
                    @endforeach
                    </ul>
                </td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->brand }}</td>
                <td>
     

                    <form action="{{ route('products_man.delete', $item->id) }}" method="POST">
                    @csrf
                    @method("DELETE")
                        <button type="submit" class="btn btn-outline-danger" >
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </thead>
        </tbody>
    </table>
</div>
<div class="d-flex justify-content-center mt-5">
    {{ $products->links('vendor.pagination.custom') }}
</div>
@stop

@section('body_javascripts')
@stop