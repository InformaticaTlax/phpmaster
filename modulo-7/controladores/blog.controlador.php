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

    //Mostar Articulos y categorias con inner Join
    static public function ctrMostrarConInnerJoin()
    {

        $tabla1 = "categorias";
        $tabla2 = "articulos";

        $respuesta = ModeloBlog::mdlMostrarConInnerJoin($tabla1 , $tabla2);

        return $respuesta;
    }
}