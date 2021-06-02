<?php

namespace Database\Seeders;

use App\Models\ProductInfo;
use Illuminate\Database\Seeder;

class ProductInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        ProductInfo::create([
            'product' => 1,
            'images' => 1,
        ]);
    }
}
