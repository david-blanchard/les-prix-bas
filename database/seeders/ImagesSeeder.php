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
            'url' => "/assets/images/articles/platine-vinyle.jpg",
            'alt' => "Platine vinyle stéréo compacte",
            'title' => "Platine vinyle stéréo compacte Auna pas chère",
        ]);
    }
}
