<?php

namespace App\Http\Controllers;

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

        $props = [];
        $props['title'] = "Platine vinyle stéreo";
        $props['description'] = "Platine vinyle compacte avec système de prise de son et capot de protection. Idéale pour réécouter les disques des années 70/80.";
        $props['price'] = "49 €";
        $props['image'] = "/assets/images/articles/platine-vinyle.jpg";
        $props['caption'] = "Platine vinyle";
        $props['featuresCaption'] = "En détails";
        $props['features'] = [];
        $props['features'][] = "Platine vinyle compacte";
        $props['features'][] = "Haut-parleurs intégrés";
        $props['features'][] = "Fonction start/stop";
        $props['features'][] = "Sortie casque jack 3,5mm";
        $props['features'][] = "Vitesse de lecture 45 et 33 tours";

        $props = (object) $props;
        return View('product', ['props' => $props]);
    }
}
