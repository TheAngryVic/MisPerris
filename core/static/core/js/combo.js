$(document).ready(function(){

    //capturamos cuando el usuario seleccione una opcion del combobox

    $("#cboRegion").change(function() {
        //este metodo se ejecuta cuando el usuario cambia de opcion en el combobox

        var regionId = $("#cboRegion").val();

        
        //enviamos el id rescatado a un archivo php para obtener los option
        
        $.get("combo.php", {id:regionId}, function(respuesta1) {
            //recibimos la respuesta
            //console.log(respuesta1);
            $("#cboProvincia").html(respuesta1);
            //habilitamos el combobox
            $("#cboProvincia").prop("disabled", false);
        
        });


    });
	
	$("#cboProvincia").change(function() {
        //este metodo se ejecuta cuando el usuario cambia de opcion en el combobox

        var provinciaId = $("#cboProvincia").val();

        
        //enviamos el id rescatado a un archivo php para obtener los option
        
        $.get("combo2.php", {id:provinciaId}, function(respuesta2) {
            //recibimos la respuesta
            console.log(respuesta2);
            $("#cboComuna").html(respuesta2);
            //habilitamos el combobox
            $("#cboComuna").prop("disabled", false);
        
        });


    });

});