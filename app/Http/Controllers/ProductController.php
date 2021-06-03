<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Images;
use App\Models\ProductImages;
use App\Models\Products;
use Illuminate\Http\Request;

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

        $props = $this->getProductProperties($productId);
        $props['brand'] = $this->getBrand($props['brand']);

        [$props['description'], $props['featuresCaption'], $props['features']] = $this->grabDescriptionAndFeatures($props['description']);

        $images = $this->getImages($productId);

        $json = json_encode($images);
        $images = json_decode($json);
        $props['images'] = $images;

        $props = (object) $props;

        return View('product', ['props' => $props]);
    }

    private function getProductProperties(int $productId): array
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

        $productImages = ProductImages::where('product', $productId)->get();
        $imagesId = [];
        $productImages->each(function ($item) use (&$imagesId) {
            $props = $item->getAttributes();
            array_push($imagesId, $props['image']);
        });

        $images = Images::whereIn('id', $imagesId)->get();

        $images->each(function($item) use (&$result) {
            $image = $item->getAttributes();
            array_push($result, $image);
        });

        return $result;
    }

    private function grabDescriptionAndFeatures(string $phrase): array
    {

        $rule = '/(?:([^§]*)(?:[^§]|.))§?/m';
        $subject = str_replace('§', ' §', $phrase) . ' §';
        preg_match_all($rule, $subject, $matches, PREG_SET_ORDER, 0);

        $description = $matches[0][1];

        $featuresCaption = isset($matches[1]) ? $matches[1][1] : null;

        $featuresSet = isset($matches[2]) ? $matches[2][1] : '';

        $features = $this->grabFeatures($featuresSet);

        return [$description, $featuresCaption, $features];
    }

    private function grabFeatures(string $phrase): array
    {
        $features = [];

        $rule = '/(?:([^|]*)(?:[^|]|.))\|?/';
        $subject = str_replace('|', ' |',  $phrase) . ' |';
        preg_match_all($rule, $subject, $matches, PREG_SET_ORDER, 0);

        if (count($matches)) {
            $features = array_map(function ($item) {
                return $item[1];
            }, $matches);
        }

        return $features;
    }
}
