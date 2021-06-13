<?php

namespace App\Http\Controllers;

use App\Library\Helpers\BrandsHelper;
use App\Library\Helpers\ImagesHelper;
use App\Library\Helpers\ProductsHelper;
use App\Models\Products;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
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
            return View('product', $props);
        }

        $attr = ProductsHelper::getAttributesByProductId();
        $props = $this->attributesToProperties($attr);
        ProductsHelper::putPropertiesInCacheById(-1, $props);
        return View('product', $props);
    }

    public function show($slug)
    {

        $props = ProductsHelper::getPropertiesFromCacheBySlug($slug);
        if ($props !== null) {
            return View('product', $props);
        }

        $slug2 = Str::slug($slug);
        $products = Products::where('slug', $slug)->orWhere('slug', 'like', '%' . $slug2 . '%')->get();
        $product = $products->first();

        if ($product === null) {
            return View('error.404');
        }

        $attr = $product->getAttributes();

        $props = $this->attributesToProperties($attr);

        ProductsHelper::putPropertiesInCacheBySlug($slug, $props);

        return View('product', $props);

    }

    private function attributesToProperties(array $props): array
    {
        $props['brand'] = BrandsHelper::getBrandNameById($props['brand']);
        $props['discount'] = ProductsHelper::computeDiscount($props['price'], 25);

        $props['featuresCaption'] = 'Information complémentaires';
        $props['features'] = ProductsHelper::grabMoreInfo($props['more_infos']);

        $images = ImagesHelper::getImagesByProductId($props['id']);
        $props['images'] = $images;

        return $props;
    }

}
