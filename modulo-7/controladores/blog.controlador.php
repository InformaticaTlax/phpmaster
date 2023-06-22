<?php

class ControladorBlog {

    //mostrar contenido tabla blog

    static public function ctrMostrarBlog(){

        $tabla = "blog";

        $respuesta = ModeloBlog::mdlMostrarBlog($tabla);

        return $respuesta;
        

    }

    //mostrar contenido categorias

    static public function ctrMostrarCategorias()
    {

        $tabla = "categorias";

        $respuesta = ModeloBlog::mdlMostrarcategorias($tabla);

        return $respuesta;
    }
}