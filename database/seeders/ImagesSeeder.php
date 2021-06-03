<?php

namespace Database\Seeders;

use App\Models\Images;
use Illuminate\Database\Seeder;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Images::create([
            'url' => "/assets/images/articles/veste-en-jean-cintree-manches-longues-femme-bleu-1.webp",
            'alt' => "Veste en jean cintrée manches longues femme bleue 1/4",
            'title' => "Veste en jean bleu cintrée manches longues pour femme, pas chère",
        ]);
        Images::create([
            'url' => "/assets/images/articles/veste-en-jean-cintree-manches-longues-femme-bleu-2.webp",
            'alt' => "Veste en jean cintrée manches longues femme bleue 2/4",
            'title' => "Veste en jean bleu cintrée manches longues pour femme, pas chère",
        ]);
        Images::create([
            'url' => "/assets/images/articles/veste-en-jean-cintree-manches-longues-femme-bleu-3.webp",
            'alt' => "Veste en jean cintrée manches longues femme bleue 3/4",
            'title' => "Veste en jean bleu cintrée manches longues pour femme, pas chère",
        ]);
        Images::create([
            'url' => "/assets/images/articles/veste-en-jean-cintree-manches-longues-femme-bleu-4.webp",
            'alt' => "Veste en jean cintrée manches longues femme bleue 4/4",
            'title' => "Veste en jean bleu cintrée manches longues pour femme, pas chère",
        ]);
    }
}
