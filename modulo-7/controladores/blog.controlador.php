<?php

class ControladorBlog {

    //mostrar contenido tabla blog

    static public function ctrMostrarBlog(){

        $tabla = "blog";

        $respuesta = ModeloBlog::mdlMostrarBlog($tabla);

        return $respuesta;
        

    }

    //mostrar contenido categorias

    static public function ctrMostrarCategorias($item, $valor)
    {

        $tabla = "categorias";

        $respuesta = ModeloBlog::mdlMostrarcategorias($tabla, $item, $valor);

        return $respuesta;
    }

    //Mostar Articulos y categorias con inner Join
    static public function ctrMostrarConInnerJoin($desde, $cantidad, $item, $valor)
    {

        $tabla1 = "categorias";
        $tabla2 = "articulos";

        $respuesta = ModeloBlog::mdlMostrarConInnerJoin($tabla1 , $tabla2, $desde, $cantidad, $item, $valor);

        return $respuesta;
    }

    //mostrar total Artiuclos
    static public function ctrMostrartotalArticulos($item, $valor){

        $tabla = "articulos";

        $respuesta = ModeloBlog::mdlMostrarTotalArticulos($tabla, $item, $valor);

        return $respuesta;

    }

    //mostrar opiniones

    static public function ctrMostrarOpiniones($item, $valor)
    {

        $tabla1 = "opiniones";
        $tabla2 = "administradores";

        $respuesta = ModeloBlog::mdlMostrarOpiniones($tabla1, $tabla2, $item, $valor);

        return $respuesta;
    }

    //enviar opinion
    static public function ctrEnviarOpinion()
    {

        if (isset($_POST["nombre_opinion"])) {

            if (
                preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/', $_POST["nombre_opinion"]) &&
                preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["correo_opinion"]) &&
                preg_match('/^[=\\$\\;\\*\\"\\?\\¿\\!\\¡\\:\\.\\,\\0-9a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/',  $_POST["contenido_opinion"])
            ) {

                /*=============================================
				VALIDACIÓN FOTO LADO SERVIDOR
				=============================================*/

                if (isset($_FILES["fotoOpinion"]["tmp_name"]) && !empty($_FILES["fotoOpinion"]["tmp_name"])) {

                    /*=============================================
					CAPTURAR ANCHO Y ALTO ORIGINAL DE LA IMAGEN Y DEFINIR LOS NUEVOS VALORES
					=============================================*/

                    list($ancho, $alto) = getimagesize($_FILES["fotoOpinion"]["tmp_name"]);

                    $nuevoAncho = 128;
                    $nuevoAlto = 128;

                    /*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

                    $directorio = "vistas/img/usuarios/";

                    /*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

                    if ($_FILES["fotoOpinion"]["type"] == "image/jpeg") {

                        $aleatorio = mt_rand(100, 9999);

                        $ruta = $directorio . $aleatorio . ".jpg";

                        $origen = imagecreatefromjpeg($_FILES["fotoOpinion"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagejpeg($destino, $ruta);
                    } else if ($_FILES["fotoOpinion"]["type"] == "image/png") {

                        $aleatorio = mt_rand(100, 9999);

                        $ruta = $directorio . $aleatorio . ".png";

                        $origen = imagecreatefrompng($_FILES["fotoOpinion"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagealphablending($destino, FALSE);

                        imagesavealpha($destino, TRUE);//si trae trasnaoarencia la imagen 

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagepng($destino, $ruta);
                    } else {

                        return "error-formato";
                    }
                } else {


                    $ruta = "vistas/img/usuarios/default.png";
                }


                $tabla = "opiniones";

                $datos = array(
                    "id_art" => $_POST["id_art"],
                    "nombre_opinion" => $_POST["nombre_opinion"],
                    "correo_opinion" => $_POST["correo_opinion"],
                    "foto_opinion" => $ruta,
                    "contenido_opinion" => $_POST["contenido_opinion"],
                    "fecha_opinion" => date('Y-m-d'),
                    "id_adm" => 1
                );

                $respuesta = ModeloBlog::mdlEnviarOpinion($tabla, $datos);

                return $respuesta;
            } else {

                return "error";
            }
        }
    }
    //Actualizar vista Articulos

    static public function ctrActualizarVista($ruta){

        $articulo =  ControladorBlog::ctrMostrarConInnerJoin(0,-1,"ruta_articulo", $ruta);

        $valor = $articulo[0]["vistas_articulo"] + 1;

        $tabla = "articulos";

        $respueta = ModeloBlog::mdlActualizarVista($tabla, $valor, $ruta);
    }
    /*=============================================
	Articulos Destacados
	=============================================*/

    static public function ctrArticulosDestacados($item, $valor)
    {

        $tabla = "articulos";

        $respuesta = ModeloBlog::mdlArticulosDestacados($tabla, $item, $valor);

        return $respuesta;
    }

    static public function ctrBuscador($desde, $cantidad, $busqueda)
    {

        $tabla1 = "categorias";
        $tabla2 = "articulos";

        $respuesta = ModeloBlog::mdlBuscador($tabla1, $tabla2, $desde, $cantidad, $busqueda);

        return $respuesta;
    }

    /*=============================================
	Total Buscador
	=============================================*/

    static public function ctrTotalBuscador($busqueda)
    {

        $tabla = "articulos";

        $respuesta = ModeloBlog::mdlTotalBuscador($tabla, $busqueda);

        return $respuesta;
    }
    
}