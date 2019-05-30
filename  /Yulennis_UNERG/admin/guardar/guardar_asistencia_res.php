
<?php
include('../../conexion.php');
$id_responsable = strtoupper($_GET['id_responsable']);
$hora1 = strtoupper($_GET['hora1']);
$hora2 = strtoupper($_GET['hora2']);
$fecha = date('Y/m/d');



// consulta de la tabla profesores


$sql = ("SELECT hora1,hora2,id_responsable,fecha FROM asistencia WHERE (hora1>='$hora1' AND hora1<='$hora2') AND (hora2>='$hora1' AND hora2<='$hora2') AND (id_responsable = '$id_responsable' AND fecha = '$fecha')");


$result = $mysqli->query($sql);
$num = $result->num_rows;

// si mi resultado de la consulta es distinto a 0 realizo lo siguiente

if ($num == 0) {

	//echo "registrar";
	$sql1 = ("INSERT into asistencia(id_responsable,hora1,hora2,fecha) values
   ('$id_responsable','$hora1','$hora2','$fecha')");

  // muestro mensajes 
  if (mysqli_query($mysqli, $sql1)) {
      
      header("Location:../consulta_asistencia_hoy_res.php?pagina=1?exito");
      exit;
 

      }

}else{

	echo "<meta http-equiv='refresh' content='0;url=../consulta_asistencia_hoy_res.php?pagina=1?ocupado'>";
}

      
?>