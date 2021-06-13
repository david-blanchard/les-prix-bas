<?php

namespace App\Http\Controllers;

use App\Library\Helpers\BrandsHelper;
use App\Models\Brands;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $products = DB::table('products')->paginate(env('PAGINATION'));
        if (!$user || $user->role !== User::ADMIN_ROLE) {
            return redirect()->route('login');
        }
        return View('admin.products', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = BrandsHelper::getAllFromCache();

        return view('admin.products.create', [
            'brands' => $brands,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Products::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'more_infos' => $request->input('more_infos'),
            'price' => $request->input('price'),
            'brand' => $request->input('brand'),
        ]);

        return redirect()->route('products_man')->with('warning', "Le produit a bien été enregistré");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $product)
    {
        $brands = BrandsHelper::getAllFromCache();
        return view('admin.products.edit', [
            'product' => $product,
            'brands' => $brands,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $product)
    {
        $product->name = $request->input("name");
        $product->description = $request->input("description");
        $product->more_infos = $request->input("more_infos");
        $product->price = $request->input("price");
        $product->brand = $request->input("brand");
        $product->save();

        return redirect()->route('products_man')->with('success', "Le produit a bien été mis à jour");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $product)
    {
        $product->delete();

        return redirect()->route('products_man')->with('success', "Le produit a bien été supprimé");
    }
}
