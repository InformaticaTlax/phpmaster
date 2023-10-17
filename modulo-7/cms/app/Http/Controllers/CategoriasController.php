<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    //
    public function index()
    {

        $categorias = Categorias::all();
        $blog = Blog::all();

        return view("paginas.categorias", array("categorias" => $categorias, "blog" => $blog));
    }
}
