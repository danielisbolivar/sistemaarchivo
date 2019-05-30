
<?php
include('../../conexion.php');
$id_categoria = strtoupper($_POST['id_categoria']);
$codigo_producto = strtoupper($_POST['codigo_producto']);
$marca = strtoupper($_POST['marca']);
$nombre_equipo = strtoupper($_POST['nombre_equipo']);
$estado = strtoupper($_POST['estado']);
$detalle = strtoupper($_POST['detalle']);
$cantidad = strtoupper($_POST['cantidad']);
$ubicacion = strtoupper($_POST['ubicacion']);
$sede = strtoupper($_POST['sede']);
$fecha_registro = date('Y/m/d');




// consulta de la tabla profesores
$sql = ("SELECT from productos");
$result = $mysqli->query($sql);
//$num=$result->num_rows;

// si mi resultado de la consulta es distinto a 0 realizo lo siguiente
if ($result == 0) 
{
  $sql = ("INSERT into productos(id_categoria,codigo_producto,marca,nombre_equipo,estado,detalle,cantidad,ubicacion,sede,fecha_registro) values
   ('$id_categoria','$codigo_producto','$marca','$nombre_equipo','$estado','$detalle','$cantidad','$ubicacion','$sede','$fecha_registro')");

  // muestro mensajes 
  if (mysqli_query($mysqli, $sql)) {
    
            echo "<meta http-equiv='refresh' content='0;url=../registrar_producto.php?msj=exito'>";

      }else {
             echo "<meta http-equiv='refresh' content='0;url=../registrar_producto.php?msj=error'>";
           }
      }
     

?>