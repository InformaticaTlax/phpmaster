<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Articulos


class ArticulosController extends Controller
{
    //
    public function index()
    {

        $articulos = Articulos::all();
        $blog = Blog::all();

        return view("paginas.articulos", array("articulos" => $articulos, "blog" => $blog));
    }
}
