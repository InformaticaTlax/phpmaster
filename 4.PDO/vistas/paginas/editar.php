<?php

if (isset($_GET["token"])) {

    $item = "token";
    $valor = $_GET["token"];

    $usuario = ControladorFormularios::ctrSeleccionarRegistros($item, $valor);

    /* echo '<pre>';
    print_r($usuario);
    echo '</pre>';*/
}

?>


<div class="d-flex justify-content-center text-center">
    <form class="p-5 bg-light" method="post">
        <h1>editar</h1>
        <form>
            <div class="form-group">
                <div class="input-group">

                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-user"></i>
                        </span>
                    </div>

                    <input type="text" class="form-control" value="<?php echo $usuario["nombre"]; ?>" id="nombre" placeholder="Ecriba su nombre" name="actualizarNombre">

                </div>

            </div>

            <div class="form-group">

                <div class="input-group">

                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-envelope"></i>
                        </span>
                    </div>

                    <input type="email" class="form-control" value="<?php echo $usuario["email"]; ?>" id="email" placeholder="Escruba su Email" name="actualizarEmail">

                </div>

            </div>

            <div class="form-group">

                <div class="input-group">

                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-lock"></i>
                        </span>
                    </div>

                    <input type="password" class="form-control" id="pwd" placeholder="Escriba su contraseña" name="actualizarPassword">

                    <input type="hidden" name="passwordActual" value="<?php echo $usuario["password"]; ?>">

                    <input type="hidden" name="tokenUsuario" value="<?php echo $usuario["token"]; ?>">
                    <input type="hidden" name="idUsuario" value="<?php echo $usuario["id"]; ?>">

                </div>
                <?php

                $actualizar = ControladorFormularios::ctrActualizarRegistro();
                
                if ($actualizar == "ok") {
                    echo '<script> 
                    if(windows.history.replaceState){
                    
                        windows.history.replaceState(null,null,windows.location.href);
                    
                    }    
                    </script>';

                    echo '<div class= "alert-success">El usuario a sido Actualizado</div>
                    <script>
                    
                        setTimeout(function(){
                            
                            window.location = "index.php?pagina=inicio";
                        },1500);

                    </script>
                
                ';
                
                }

                if ($actualizar == "error") {
                    echo '<script> 
                    if(windows.history.replaceState){
                    
                        windows.history.replaceState(null,null,windows.location.href);
                    
                    }    
                    </script>';

                    echo '<div class= "alert-danger">Error al actualizar usuario</div>
                    
                
                ';
                }
                
                ?>


                <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
</div>