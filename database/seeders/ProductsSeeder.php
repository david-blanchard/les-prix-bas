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
            'name' => "Veste en jean cintrée manches longues femme Bleu",
            'description' => "Veste. Col chemise. Fermeture par boutons métalliques. Manches longues avec poignets et boutons. Poches plaquées à rabats sur poitrine. Poches passepoilées sur les côtés. Empiècements.",
            'more_infos' => "Ne pas nettoyer à sec;lavage à 30°;100% coton",
            'price' => 37.99,
            'brand' => 1,
        ]);
    }
}
