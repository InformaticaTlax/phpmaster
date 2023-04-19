<?php
class ControladorFormularios{

    //Resgistro

    public function ctrRegistro(){
        if(isset($_POST["registroNombre"])){
            
            echo $_POST["registroNombre"];

        }
    }





}