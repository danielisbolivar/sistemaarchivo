<?php
include('../../conexion.php');

$fecha_registro = date('Y/m/d');
$seccion = $_GET['seccion'];
$id_profesor = $_GET['id_profesor'];
$id_materia = $_GET['id_materia'];

$sql = ("SELECT * FROM asistencia_est WHERE fecha_registro='$fecha_registro'   AND seccion = '$seccion' AND id_materia = '$id_materia'  AND id_profesor = '$id_profesor'");


$result = $mysqli->query($sql);
$num = $result->num_rows;

// si mi resultado de la consulta es distinto a 0 realizo lo siguiente

if ($num == 0) {

if ( !empty($_GET["id_estudiante"]) && is_array($_GET["id_estudiante"]) ) { 
    echo "<ul>";
    foreach ( $_GET["id_estudiante"] as $id_estudiante ) { 
            
            $sql = ("INSERT into asistencia_est(id_estudiante,id_profesor,id_materia,seccion,fecha_registro) values
   ('$id_estudiante','$id_profesor','$id_materia','$seccion','$fecha_registro')");

  // muestro mensajes 
  if (mysqli_query($mysqli, $sql)) {
    
            echo "<meta http-equiv='refresh' content='0;url=../asistencia_est.php?msj=exito'>";

      }
            
     }
     
 }
}else {
             echo "<meta http-equiv='refresh' content='0;url=../asistencia_est.php?msj=listo'>";
           } 
?>