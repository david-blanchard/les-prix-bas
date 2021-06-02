<?php

namespace Database\Seeders;

use App\Models\Products;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Products::create([
            'name' => "Platine vinyle stéréo",
            'description' => "Platine vinyle compacte avec système de prise de son et capot de protection. Idéale pour réécouter les disques des années 70/80.§En détails§Platine vinyle compacte|Haut-parleurs intégrés|Fonction start/stop|Sortie casque jack 3,5mm|Vitesse de lecture 45 et 33 tours",
            'price' => 49.0,
            'brand' => 1,
        ]);
    }
}
