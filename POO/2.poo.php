<?php

    //clase
    //es un modelo que se utiliza ara creae objetos, el mismo estado e identidad.

    class Automovil{
        //propiedades
        //son las caracteristicas que puede tener un objeto

        public $marca;
        public $modelo;

        //metodo
        //es una algoritmo asociado a un objeto

        public function mostrar(){
            echo "<p>hola soy un $this->marca,modelo $this->modelo</p>";
        }
    }

    #obejto es uuna entidad provista o  mensajs a los cuales responde propiedades con valores concretos

    $a= new Automovil();
    $a -> marca ="toyota";
    $a -> modelo ="corola";
    $a ->mostrar()

?>