<?php 

$conexion = new mysqli("localhost", "root", "", "misperris");

//con esto nos evitamos problemas con las ñ y las tildes
$conexion->set_charset('utf8');

$resultadoRegiones = $conexion->query("select * from regiones");

$resultadoProvincias = $conexion->query("select * from provincias");

$resultadoComunas = $conexion->query("select * from comunas");

$resultadoViviendas = $conexion->query("select * from vivienda");
$mensaje = "";

if(!empty($_POST)) {
	$correo = $_POST['txtCorreo'];
	$clave = $_POST['txtClave'];
    $rut = $_POST['txtRut'];
    $nombre = $_POST['txtNombre'];
    $apellido = $_POST['txtApellido'];
    $fechaNacimiento = $_POST['txtFechaNacimiento'];
	$telefono = $_POST['txtTelefono'];
    $comunaId = $_POST['cboComuna'];	
    $tipoViviendaId = $_POST['cboVivienda'];

    $sql = "insert into 'cliente' values('$correo', '$clave', '$rut', '$nombre', '$apellido','$fechaNacimiento', '$telefono',$comunaId, , $tipoViviendaId)";
    $resultado = $conexion->query($sql);
    if(!$resultado) {
        $mensaje = "Ha ocurrido un error al ejecutar la consulta";
    } else {
        $mensaje = "Guardado correctamente";
    }
}   

?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Registro Mis Perris</title>
     {% load static %}
    <link rel="icon" type="image/png" href="img/Huella_b.png" />
    <link rel="stylesheet" href="{% static 'core/css/registro2.css' %}">

    <body>
        <center>
        <div class="registro">    
        
        <form action="" method="POST" id="formulario">
        <table class="formularioUsuario" opacity:0.1;filter:alpha(opacity=1.0)>


        <td><h2>FORMULARIO</h2></td> 
        <center>
        <img class="formp" src="img/logo.png" alt="formp">
    </center>
        <br>
        <center>
        <img class="formm" src="img/perro.png" alt="formm">
    
        <tr>
            <td><label for="">Run</label></td>
            <td><input type="text" name="txtrun" id="txtrun"></td>
        </tr>
        <br>   
        <br>
        <tr>         
            <td><label for="">Nombre</label></td>        
            <td><input type="text" name="txtNombre" id="txtNombre"></td>        
        </tr>
        <tr>         
            <td><label for="">Nacimiento</label></td>        
            <td><input type="date" name="datenaci" id="datenaci"></td>        
        </tr>
        <tr>         
            <td><label for="">Telefono</label></td>        
            <td><input type="number" name="telefono" id="telefono"></td>        
        </tr>
        <tr>         
            <td><label for="">Correo</label></td>        
            <td><input type="text" name="txtCorreo" id="txtCorreo"></td>        
        </tr>
            <tr>         
            <td><label for="">Region</label></td>  
            <td><select name="cboRegion" id="cboRegion">
                        <option value="">Seleccionar</option>
                        <?php while($fila = $resultadoRegiones->fetch_assoc()): ?>
                            <option value="<?php echo $fila["id_region"];?>">
                                <?php echo $fila["nombre_region"]; ?>
                            </option>
                        <?php endwhile; ?>  
                    </select></td>        
            </tr>
            <tr>         
            <td><label for="">Comuna</label></td>
            <td><select name="cboComuna" id="cboComuna">
                        <option value="">Seleccionar</option>
                        <?php while($fila = $resultadoComunas->fetch_assoc()): ?>
                            <option value="<?php echo $fila["id_comuna"];?>">
                                <?php echo $fila["nombre_comuna"]; ?>
                            </option>
                        <?php endwhile; ?>
          
            </select></td>         
            </tr>
            <tr>         
            <td><label for="">Vivienda</label></td>        
            <td><select name="cboVivienda" id="cboVivienda">
                        <option value="">Seleccionar</option>
                        <?php while($fila = $resultadoVivienda->fetch_assoc()): ?>
                            <option value="<?php echo $fila["id_vivienda"];?>">
                                <?php echo $fila["nombre_vivienda"]; ?>
                            </option>
                        <?php endwhile; ?>
            </select></td>  
                      
            </tr>
            <td><input class="button" type="submit" name="btnAnio" id="btnAnio" value="Guardar"></td>
            
                   
                      
     </table>
    </form>   
         </div></center>
         </div>
        <br>
        <br>
        <br>
       
    </body>
    </html>