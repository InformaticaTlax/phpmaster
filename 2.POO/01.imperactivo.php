<?php
    //codigo emperativo o espagueti
    $automovil1 = (object)["marca"=> "toyota", "modelo"=>"corola"];
    $automovil2 = (object)["marca"=> "hyundaai", "modelo"=>"Accent"];

    function mostrar($automovil){

        echo "<p>Hola soy un $automovil->marca, modelo $automovil->modelo<p>";

    }

    mostrar($automovil1);
    mostrar($automovil2);

?>