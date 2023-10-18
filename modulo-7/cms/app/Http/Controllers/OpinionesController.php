<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OpinionesController extends Controller
{
    //
    public function index(){
        $opiniones =   Opiniones::all;

        return view("paginas.opiniones", array("opiniones" =>$opiniones));

    }
}
