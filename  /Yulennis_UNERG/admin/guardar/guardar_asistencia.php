
<?php
include('../../conexion.php');
$id_profesor = strtoupper($_GET['id_profesor']);
$hora1 = strtoupper($_GET['hora1']);
$hora2 = strtoupper($_GET['hora2']);
$fecha = date('Y/m/d');



// consulta de la tabla profesores


$sql = ("SELECT hora1,hora2,id_profesor,fecha FROM asistencia WHERE (hora1>='$hora1' AND hora1<='$hora2') AND (hora2>='$hora1' AND hora2<='$hora2') AND (id_profesor = '$id_profesor' AND fecha = '$fecha')");


$result = $mysqli->query($sql);
$num = $result->num_rows;

// si mi resultado de la consulta es distinto a 0 realizo lo siguiente

if ($num == 0) {

$sql = ("INSERT into asistencia(id_profesor,id_responsable,hora1,hora2,fecha) values ('$id_profesor','0','$hora1','$hora2','$fecha')");
 if (mysqli_query($mysqli, $sql)) {
    
    header("Location:../consulta_asistencia_hoy.php?pagina=1?exito");
exit;
 
      }


}else{

echo "<meta http-equiv='refresh' content='0;url=../consulta_asistencia_hoy.php?pagina=1?ocupado'>";
}

  
?>