<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnunciosController extends Controller
{
    //
    public function index()
    {

        $anuncios = Anuncios::all();
        $blog = Blog::all();

        return view("paginas.anuncios", array("anuncios" => $anuncios, "blog" => $blog));
    }
}
