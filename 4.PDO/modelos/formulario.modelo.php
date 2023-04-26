<?php

require_once "conexion.php";

class ModeloFormularios{
    //registro

    static public function mdlRegistro($tabla, $datos){
        #statement: declaración

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.
     
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, email, password) VALUES (:nombre, :email, :password)");

        #bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";
        }else{

            print_r(Conexion::conectar()->errorInfo());
        }

        $stmt->close();

        $stmt = null;
        
    }
    //Seleccionar Registros

    static public function mdlSeleccionarRegistros($tabla){

        $stmt = Conexion::conectar()->prepare("SELECT *, DATE_FORMAT(fecha, '%d/%m/%Y') AS fecha FROM $tabla");

        $stmt->execute();

        return $stmt ->fetchAll();

        $stmt->close();

        $stmt = null;

    }

}