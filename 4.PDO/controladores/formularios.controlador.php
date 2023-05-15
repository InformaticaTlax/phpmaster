<?php
class ControladorFormularios{

    //Resgistro

    static public function ctrRegistro(){
        if(isset($_POST["registroNombre"])){
            if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["registroNombre"]) &&
                preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["registroEmail"]) &&
			   preg_match('/^[0-9a-zA-Z]+$/', $_POST["registroPassword"])){

                $tabla = "registros";

                $token = md5($_POST["registroNombre"]."+". $_POST["registroEmail"]);

                $datos = array(
                        "token" => $token,
                        "nombre" => $_POST["registroNombre"],
                        "email" => $_POST["registroEmail"],
                        "password" => $_POST["registroPassword"]
                    );

                $respuesta = ModeloFormularios::mdlRegistro($tabla, $datos);

                return $respuesta;

            }else{

                $respuesta = "error";
                return $respuesta;
            }
            

        }
    }


    //seleccionar Resgitros

    static public function ctrSeleccionarRegistros($item, $valor){

        $tabla = "registros";

        $respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);
        
        return $respuesta;
    }

    //Ingreso

    public function ctrIngreso(){
        if (isset($_POST["ingresoEmail"])) {

            $tabla = "registros";
            $item = "email";
            $valor = $_POST["ingresoEmail"];


            $respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);

            if($respuesta["email"] == $_POST["ingresoEmail"] && $respuesta["password"] == $_POST["ingresoPassword"]) {

                $_SESSION["validarIngreso"] = "ok";
                
                echo '<script>

					if ( window.history.replaceState ) {

						window.history.replaceState( null, null, window.location.href );

					}

					window.location = "index.php?pagina=inicio";

				</script>';

                

            }else{

                echo '<script> 
                    if(window.history.replaceState){
                    
                        window.history.replaceState(null,null,window.location.href);
                    
                    }    
                </script>';

                echo '<div class= "alert-danger">Error al ingresar al sistema</div>';
            }

            

        }
     
    }

    //actualizar Registro

    static public function ctrActualizarRegistro(){

        if (isset($_POST["actualizarNombre"])) {

            if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["actualizarNombre"]) &&
                preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["actualizarEmail"])) {


                $usuario = ModeloFormularios::mdlSeleccionarRegistros("registros", "token", $_POST["tokenUsuario"]);

                $compararToken = md5($usuario["nombre"] . "+" . $usuario["email"]);

                if($compararToken == $_POST["tokenUsuario"]){

            
                    if($_POST["actualizarPassword"] != ""){

                        if(preg_match('/^[0-9a-zA-Z]+$/', $_POST["actualizarPassword"])){

                            $password = $_POST["actualizarPassword"];

                        }

                    }else{

                        $password = $_POST["passwordActual"];

                    }

                    $tabla = "registros";

                    $datos = array(
                        "token" => $_POST["tokenUsuario"],
                        "nombre" => $_POST["actualizarNombre"],
                        "email" => $_POST["actualizarEmail"],
                        "password" => $password
                    );

                    $respuesta = ModeloFormularios::mdlActualizarRegistro($tabla, $datos);

                    return $respuesta;
                }else{

                    $respuesta = "error ";

                    return $respuesta;

                }
            } else {

                $respuesta = "error ";

                return $respuesta;
            }
        
        }
    }
    //eliminar registro
    public function ctrEliminarRegistro(){
        if (isset($_POST["eliminarRegistro"])) {

            $usuario = ModeloFormularios::mdlSeleccionarRegistros("registros", "token", $_POST["eliminarRegistro"]);

            $compararToken = md5($usuario["nombre"] . "+" . $usuario["email"]);

            if ($compararToken == $_POST["eliminarRegistro"]) {


                $tabla = "registros";

                $valor = $_POST["eliminarRegistro"];

                $respuesta = ModeloFormularios::mdlEliminarRegistro($tabla, $valor);

                if($respuesta == "ok") {

                    echo '<script>

                        if ( window.history.replaceState ) {

                            window.history.replaceState( null, null, window.location.href );

                        }

                        window.location = "index.php?pagina=inicio";
                        </script>' ;               

                }
            }

        }

    }

}