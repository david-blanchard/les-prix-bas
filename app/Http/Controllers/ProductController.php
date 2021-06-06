<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Images;
use App\Models\ProductImages;
use App\Models\Products;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $attr = $this->getAttributesByProductId($productId);
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
        $props['brand'] = $this->getBrand($attributes['brand']);

        $props['featuresCaption'] = 'Information complémentaires';
        $props['features'] = $this->grabMoreInfo($attributes['more_info']);
        $images = $this->getImages($productId);

        $json = json_encode($images);
        $images = json_decode($json);
        $props['images'] = $images;

        return $props;
    }

    private function getAttributesByProductId(int $productId): array
    {
        $result = [];

        $products = Products::where('id', $productId)->get();
        $product = $products->first();
        $result = $product->getAttributes();

        return $result;
    } 

    private function getBrand(int $brandId): string
    {
        $result = '';

        $brands = Brands::where('id', $brandId)->get();
        if(count($brands)) {
            $result = $brands->first()->getAttributes()['name'];
        }

        return $result;
    }

    private function getImages(int $productId): array
    {
        $result = [];

        $images = DB::table('images')
        ->join('product_images', function ($join) use ($productId) {
            $join->on('images.id', '=', 'product_images.image')
                 ->where('product_images.product', '=', $productId);
        })->get();

        $result = $images->toArray();

        return $result;
    }

    private function grabMoreInfo(string $phrase): array
    {
        $result = [];
        $result = explode(';', $phrase);

        return $result;
    }
}
