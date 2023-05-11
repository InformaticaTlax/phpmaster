<div class="d-flex justify-content-center text-center">
    <form class="p-5 bg-light" method="post">
        <h1>Registro</h1>
        <form>
            <div class="form-group">
                <label for="nombre">Nombre:</label>

                <div class="input-group">

                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-user"></i>
                        </span>
                    </div>

                    <input type="text" class="form-control" id="nombre" name="registroNombre">

                </div>

            </div>

            <div class="form-group">

                <label for="email">Correo electrónico:</label>

                <div class="input-group">

                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-envelope"></i>
                        </span>
                    </div>

                    <input type="email" class="form-control" id="email" name="registroEmail">

                </div>

            </div>

            <div class="form-group">
                <label for="pwd">Contraseña:</label>

                <div class="input-group">

                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-lock"></i>
                        </span>
                    </div>

                    <input type="password" class="form-control" id="pwd" name="registroPassword">

                </div>

            </div>

            <?php

            //instanciar la clase de un metodo no estatico

           // $registro = new ControladorFormularios();
            //$registro->ctrRegistro();

            //forma en la que se instancia la clase de un metodo estatico

            $registro = ControladorFormularios::ctrRegistro();

            if($registro == "ok"){

                echo '<script> 
                    if(windows.history.replaceState){
                    
                        windows.history.replaceState(null,null,windows.location.href);
                    
                    }    
                </script>';

                echo '<div class= "alert-success">El usuario a sido registrado</div>';
            }
            if($registro == "error"){
                echo '<script> 
                    if(windows.history.replaceState){
                    
                        windows.history.replaceState(null,null,windows.location.href);
                    
                    }    
                </script>';

                echo '<div class= "alert-danger">no es permitido caracteres especiales</div>';

            }
            

            ?>

            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
</div>