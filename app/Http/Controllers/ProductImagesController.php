<?php

namespace App\Http\Controllers;

use App\Helpers\BrandsHelper;
use App\Helpers\ImagesHelper;
use App\Models\Images;
use App\Models\Product;
use App\Models\ProductImages;
use App\Models\ProductInfo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user();
        $products = DB::table('products')->paginate(20);

        if (!$user || $user->role !== User::ADMIN_ROLE) {
            return redirect()->route('login');
        }
        return View('admin.product_images', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($productId)
    {
        //
        $product = Product::where('id', $productId)->get()->first();
        $productName = $product['name'];
        $brand = BrandsHelper::getBrandNameById($product['brand']);
        $associatedImages = ImagesHelper::getImagesByProductId($productId);

        return View('admin.product_images.create', [
            'productId' => $productId,
            'productName' => $productName,
            'assocImages' => $associatedImages,
            'brand' => $brand,
            'images' => Images::all(),
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
        //

        // dd($request);
        $productId = $request->input('product');
        ProductImages::create([
            'product' => $productId,
            'image' => $request->input('image'),
        ]);

        return redirect()->route('product_images_man.create', ['productId' => $productId]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductInfo  $productInfo
     * @return \Illuminate\Http\Response
     */
    public function show(ProductInfo $productInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductInfo  $productInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductInfo $productInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductInfo  $productInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductInfo $productInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductInfo  $productInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductInfo $productInfo)
    {
        //
    }
}