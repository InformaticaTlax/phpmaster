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

        $datos = array(
            "dominio" => $request->input("dominio"),
            "servidor" => $request->input("servidor"),
            "titulo" => $request->input("titulo"),
            "descripcion" => $request->input("descripcion"),
            "palabras_claves" => $request->input("palabras_claves"),
            "redes_sociales" => $request->input("redes_sociales"),
            "logo_actual" => $request->input("logo_actual"),
            "portada_actual" => $request->input("portada_actual"),
            "icono_actual" => $request->input("icono_actual"));

            //recoger imagenes

            $logo = array("logo_temporal" => $request->file("logo"));
            $portada = array("portada_temporal" => $request->file("portada"));
            $icono = array("icono_temporal" => $request->file("icono"));

            //validar datos
        if (!empty($datos)) {

            $validar = \Validator::make($datos, [
                "dominio"=>'required|regex:/^[-\\_\\:\\.\\0-9a-z]+$/i',
                "servidor" => 'required|regex:/^[-\\_\\:\\.\\0-9a-z]+$/i',
                "titulo" => 'required|regex:/^[0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
                "descripcion" => 'required|regex:/^[=\\&\\$\\;\\-\\_\\*\\"\\<\\>\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
                "palabras_claves" => 'required|regex:/^[,\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
                "redes_sociales" => 'required',
                "logo_actual" => 'required',
                "portada_actual" => 'required',
                "icono_actual" => 'required'


        ]);
        
        //validar imagenes logo
        if($logo["logo_temporar"] =! ""){
            $validarLogo = \Validator::make($logo, [
                "logo_temporal" => 'required|image|mimes:jpg,jpg,png|max:2000000'
            ]);
            if($validarLogo ->fails()){

                return redirect("/")->with("no-validacion-imagen","");

            }

        }

            //validar imagenes portada
            if ($portada["portada_temporar"] = !"") {
                $validarPortada = \Validator::make($portada, [
                    "portada_temporal" => 'required|image|mimes:jpg,jpg,png|max:2000000'
                ]);
                if ($validarPortada->fails()) {

                    return redirect("/")->with("no-validacion-imagen", "");
                }
            }

            //validar icono
            if ($icono["icono_temporar"] = !"") {
                $validarIcono = \Validator::make($icono, [
                    "icono_temporal" => 'required|image|mimes:jpg,jpg,png|max:2000000'
                ]);
                if ($validarIcono->fails()) {

                    return redirect("/")->with("no-validacion-imagen", "");
                }
            }
        

        //revisar la validacion
        if($validar->fails()){

            return redirect("/")->with("no-validacion","");

        }else{

                //subir al servidor la imagen logo

                if ($logo["logo_temporal"] = !"") {

                    unlink($logo["logo_actual"]);

                    $aleatorio = mt_rand(100,999);

                    $rutaLogo = "img/blog/" . $aleatorio . "." . $portada["logo_temporal"]->guessExtension();
                    
                   // move_uploaded_file($logo["logo_temporal"],$rutaLogo);

                   //redimensionar imagenes
                   list($ancho, $alto) =getimagesize($logo["logo_temporal"]);

                   $nuevoAncho = 700;
                   $nuevoAlto = 200;

                   if($logo["logo_temporal"]->guessClientExtension() == "jpeg"){

                        $origen = imagecreatefromjpeg($logo["logo_temporal"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        imagecopyresized($destino, $origen, 0,0,0,0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagejpeg($destino, $rutaLogo);

                   }
                    if ($logo["logo_temporal"]->guessClientExtension() == "png") {

                        $origen = imagecreatefrompng($logo["logo_temporal"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        imagealphablending($destino, FALSE);
                        imagesavealpha($destino, TRUE);
                        imagecopyresampled($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagepng($destino, $rutaLogo);

                    }
                }else{

                    $rutaLogo = $datos["logo_actual"];

                }
                //subir al servidor la imagen portada

                if ($portada["portada_temporal"] = !"") {

                    unlink($logo["portada_actual"]);
                    
                    $aleatorio = mt_rand(100, 999);

                    $rutaPortada = "img/blog/" . $aleatorio . "." . $portada["portada_temporal"]->guessExtension();

                    //move_uploaded_file($portada["logo_temporal"], $rutaPortada);

                    //redimensionar imagenes
                    list($ancho, $alto) = getimagesize($portada["portada_temporal"]);

                    $nuevoAncho = 700;
                    $nuevoAlto = 420;

                    if ($portada["portada_temporal"]->guessClientExtension() == "jpeg") {

                        $origen = imagecreatefromjpeg($portada["portada_temporal"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagejpeg($destino, $rutaPortada);
                    }
                    if ($portada["portada_temporal"]->guessClientExtension() == "png") {

                        $origen = imagecreatefrompng($portada["portada_temporal"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        imagealphablending($destino, FALSE);
                        imagesavealpha($destino, TRUE);
                        imagecopyresampled($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagepng($destino, $rutaPortada);
                    }

                } else {

                    $rutaPortada = $datos["portada_actual"];
                }

                //subir al servidor la imagen icono

                if ($icono["icono_temporal"] = !"") {

                    unlink($logo["icono_actual"]);
                    
                    $aleatorio = mt_rand(100, 999);

                    $rutaIcono = "img/blog/" . $aleatorio . "." . $icono["icono_temporal"]->guessExtension();

                    // move_uploaded_file($icono["logo_temporal"], $rutaIcono);

                    //redimensionar imagenes
                    list($ancho, $alto) = getimagesize($icono["icono_temporal"]);

                    $nuevoAncho = 150;
                    $nuevoAlto = 150;

                    if ($icono["icono_temporal"]->guessClientExtension() == "jpeg") {

                        $origen = imagecreatefromjpeg($icono["icono_temporal"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagejpeg($destino, $rutaIcono);
                    }
                    if ($icono["icono_temporal"]->guessClientExtension() == "png") {

                        $origen = imagecreatefrompng($icono["icono_temporal"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        imagealphablending($destino, FALSE);
                        imagesavealpha($destino, TRUE);
                        imagecopyresampled($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagepng($destino, $rutaIcono);
                    }

                } else {

                    $rutaIcono = $datos["icono_actual"];
                }
            $actualizar = array("dominio"=> $datos["dominio"],
                        "servidor" => $datos["servidor"],
                        "titulo" => $datos["titulo"],
                        "descripcion" => $datos["descripcion"], 
                        "palabras_claves"=> json_encode(explode(",", $datos["palabras_claves"])),
                        "redes_sociales" => $datos["redes_sociales"],
                        "portada" => $rutaPortada,
                        "logo" => $rutaLogo,
                        "icono" => $rutaIcono
                    );
            
            $blog = Blog::where("id",$id)->update($actualizar);

                return redirect("/")->with("ok-editar", "");
        }
    
    }else{
            return redirect("/")->with("error", "");
    }

    }
}
