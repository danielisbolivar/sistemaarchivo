
<?php
include('../../conexion.php');
$id_responsable = strtoupper($_GET['id_responsable']);
$observaciones = strtoupper($_GET['observaciones']);
$fecha_registro = date('Y/m/d');




// consulta de la tabla profesores
$sql = ("SELECT from observaciones");
$result = $mysqli->query($sql);
//$num=$result->num_rows;

// si mi resultado de la consulta es distinto a 0 realizo lo siguiente
if ($result == 0) 
{
  $sql = ("INSERT into observaciones(id_responsable,observaciones,fecha_registro) values
   ('$id_responsable','$observaciones','$fecha_registro')");

  // muestro mensajes 
  if (mysqli_query($mysqli, $sql)) {
    
            echo "<meta http-equiv='refresh' content='0;url=../consulta_observaciones1.php?pagina=1?exito'>";

      }else {
             echo "<meta http-equiv='refresh' content='0;url=../consulta_observaciones1.php?pagina=1?error'>";
           }
      }
     

?>