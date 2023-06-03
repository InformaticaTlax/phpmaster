<?php
require_once "../controladores/formularios.controlador.php";
require_once "../modelos/formulario.modelo.php";

class AjaxFormulario{
    //validar email existente

    public $validarEmail;

    public function ajaxValidarEmail(){

        $item = "email";
        $valor = $this->validarEmail;

        $respuesta = ControladorFormularios::ctrSeleccionarRegistros($item, $valor);
        echo '<pre>';
        print_r($respuesta);
        echo'</pre>';


    }
}

//objeto de ajax que recibe la variable post

if(isset($_POST["validarEmail"])){

    $valEmail= new AjaxFormularios();
    $valEmail -> validarEmail = $_POST["validarEmail"];
    $valEmail -> ajaxValidarEmail();


}
