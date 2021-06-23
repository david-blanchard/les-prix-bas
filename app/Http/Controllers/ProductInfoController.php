<?php

namespace App\Http\Controllers;

use App\Library\Helpers\ProductsHelper;
use App\Models\Products;
use Illuminate\Support\Str;

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
        $props = ProductsHelper::getPropertiesFromCacheById(-1);
        if ($props !== null) {
            return view('product_info', $props);
        }

        $attr = ProductsHelper::getAttributesByProductId();
        $props = ProductsHelper::attributesToProperties($attr);
        ProductsHelper::putPropertiesInCacheById(-1, $props);

        return view('product_info', $props);
    }

    public function show($slug)
    {

        $props = ProductsHelper::getPropertiesFromCacheBySlug($slug);
        if ($props !== null) {
            return view('product_info', $props);
        }

        $slug2 = Str::slug($slug);
        $products = Products::where('slug', $slug)->orWhere('slug', 'like', '%' . $slug2 . '%')->get();
        $product = $products->first();

        if ($product === null) {
            return abort(404);
        }

        $attr = $product->getAttributes();

        $props = ProductsHelper::attributesToProperties($attr);

        ProductsHelper::putPropertiesInCacheBySlug($slug, $props);

        return view('product_info', $props);

    }

}
