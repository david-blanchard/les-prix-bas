<?php

namespace Database\Seeders;

use App\Models\Brands;
use Illuminate\Database\Seeder;

class AllSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminSeeder = new AdminSeeder;
        $adminSeeder->run();        
        $userSeeder = new UserSeeder;
        $userSeeder->run();
        $brands = new BrandsSeeder;
        $brands->run();
        $images = new ImagesSeeder;
        $images->run();
        $products = new ProductsSeeder;
        $products->run();
        $productsImages = new ProductImagesSeeder;
        $productsImages->run();
        $productInfo = new ProductInfoSeeder;
        $productInfo->run();
    }
}
