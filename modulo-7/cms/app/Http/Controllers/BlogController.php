<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;

class BlogController extends Controller
{
    //mostarr todos lod registros 
    public function index() {
        $blog = Blog::all();

        return view("paginas.blog", array("blog"=> $blog));
        
    }

    //actualizar un registro 
    public function update($id, Request $request){

        //recoger los datos

        $datos = array("dominio"=>$request->input("dominio"),
                        "titulo" => $request->input("servidor")
                        "servidor" => $datos["servidor"],
                        "titulo" => $request->input("titulo"),
                        "descripcion" => $request->input("descripcion"));

    //validar datos
    if(!empty($datos)){

        $validar = \Validator::make($datos,[
                "dominio"=>'required|regex:/^[-\\_\\:\\.\\0-9a-z]+$/i',
                "servidor" => 'required|regex:/^[-\\_\\:\\.\\0-9a-z]+$/i',
                "titulo" => 'required|regex:/^[0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
                "descripcion" => 'required|regex:/^[=\\&\\$\\;\\-\\_\\*\\"\\<\\>\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',



        ]);

        //revisar la validacion
        if($validar->fails()){
            echo "error";
        }else{
            $actualizar = array("dominio"=> $datos["dominio"],
                        "servidor" => $datos["servidor"],
                        "titulo" => $datos["titulo"],
                        "descripcion" => $datos["descripcion"]);
        }
    
    }else{
        echo "error";
    }

    }
}
