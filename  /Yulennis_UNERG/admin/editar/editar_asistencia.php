
<?php
include("../../conexion.php");
$id_asistencia = $_GET['id_asistencia'];
$id_profesor = strtoupper($_GET['id_profesor']);
$hora1 = strtoupper($_GET['hora1']);
$hora2 = strtoupper($_GET['hora2']);
$fecha = date('Y/m/d');

// consulta de la tabla profesores
$sql = ("SELECT id_profesor, hora1, hora2, fecha FROM asistencia WHERE (hora1>='$hora1' AND hora1<='$hora2') AND (hora2>='$hora1' AND hora2<='$hora2') AND (fecha = '$fecha' AND id_profesor = '$id_profesor')");

$result = $mysqli->query($sql);
$num = $result->num_rows;

// si mi resultado de la consulta es distinto a 0 realizo lo siguiente

if ($num == 0) {

$sql1 = ("update asistencia set  id_profesor='$id_profesor', hora1='$hora1', hora2='$hora2' where id_asistencia = '$id_asistencia'");

if (mysqli_query($mysqli, $sql1)) {


    echo "<meta http-equiv='refresh' content='0;url=../consulta_asistencia_hoy.php?pagina=1?update'>";
    }
   }else {
    echo "<meta http-equiv='refresh' content='0;url=../consulta_asistencia_hoy.php?pagina=1?coinciden'>";
}

       
?>






