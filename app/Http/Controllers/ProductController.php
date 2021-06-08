<?php

namespace App\Http\Controllers;

use App\Helpers\BrandsHelper;
use App\Helpers\ImagesHelper;
use App\Helpers\ProductsHelper;
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
        $productId = 1;
        $attr = ProductsHelper::getAttributesByProductId($productId);
        $props = $this->attributesToProperties($attr);
        $props = (object) $props;

        return View('product', ['props' => $props]);
    }

    public function show($slug)
    {
        $slug2 = Str::slug($slug);
        $product = Products::where('slug', $slug)->orWhere('slug', 'like', '%' . $slug2 . '%')->get();
        $attr = $product->first()->getAttributes();

        if(count($attr)) {
            $props = $this->attributesToProperties($attr);
            $props = (object) $props;

            return View('product', ['props' => $props]);
        }

        return View('home');
    } 

    private function attributesToProperties(array $attributes): array
    {
        $props = $attributes;

        $productId = $attributes['id'];
        $props['brand'] = BrandsHelper::getBrandNameById($attributes['brand']);

        $props['featuresCaption'] = 'Information complémentaires';
        $props['features'] = ProductsHelper::grabMoreInfo($attributes['more_infos']);
        $images = ImagesHelper::getImagesByProductId($productId);

        $json = json_encode($images);
        $images = json_decode($json);
        $props['images'] = $images;

        return $props;
    }







}
