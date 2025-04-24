<?php

namespace App\Http\Controllers;

use App\Repositories\ProductsRepository;
use App\Models\Products;

class ProductInfoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $props = ProductsRepository::getPropertiesFromCacheById(-1);
        if ($props !== null) {
            return view('product_info', $props);
        }

        $attr = ProductsRepository::getAttributesByProductId();
        $props = ProductsRepository::attributesToProperties($attr);
        ProductsRepository::putPropertiesInCacheById(-1, $props);

        return view('product_info', $props);
    }

    public function show($slug)
    {

        $props = ProductsRepository::getPropertiesFromCacheBySlug($slug);
        if ($props !== null) {
            return view('product_info', $props);
        }

        $products = Products::where('slug', $slug)->orWhere('slug', 'like', '%' . $slug . '%')->get();
        $product = $products->first();

        if ($product === null) {
            return abort(404);
        }

        $attr = $product->getAttributes();

        $props = ProductsRepository::attributesToProperties($attr);

        ProductsRepository::putPropertiesInCacheBySlug($slug, $props);

        return view('product_info', $props);

    }

}
