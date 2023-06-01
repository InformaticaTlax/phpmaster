$("#email").change(function(){
    var email = $(this).val();
    //console.log("email", email);
    var datos = new FormData();

    datos.append("validarEmail", email);

    $.ajax({
        url: "../../ajax/formularios.ajax.php",
        method:"POST",
        data:datos,
        cache: false,
        contenType: false,
        processData: false,
        success: function(respuesta){
            console.log("respuesta", respuesta);


        }
    });


})