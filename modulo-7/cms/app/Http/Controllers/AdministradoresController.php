<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Administradores;

class AdministradoresController extends Controller
{
    //
    public function traerAdministradores() {
        $administradores = Administradores::all();

        return view("paginas.administradores", array("administradores"=> $administradores));
}
