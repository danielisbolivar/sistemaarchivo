
<?php
include("../../conexion.php");
$id_asig_est = strtoupper($_GET['id_asig_est']);
$id_estudiante = strtoupper($_GET['id_estudiante']);
$id_profesor = strtoupper($_GET['profesor']);
$id_materia = strtoupper($_GET['materia']);
$seccion = strtoupper($_GET['seccion']);

// consulta de la tabla profesores
$sql = ("SELECT id_estudiante, id_profesor, id_materia, seccion FROM asig_estudiantes WHERE (id_estudiante = '$id_estudiante' AND id_profesor = '$id_profesor' AND id_materia = '$id_materia' AND seccion = '$seccion')");


$result = $mysqli->query($sql);
$num = $result->num_rows;

// si mi resultado de la consulta es distinto a 0 realizo lo siguiente

if ($num == 0) {

$sql1 = ("update asig_estudiantes set  id_profesor='$id_profesor', id_estudiante = '$id_estudiante', id_materia='$id_materia', seccion='$seccion' where id_asig_est = '$id_asig_est'");

if (mysqli_query($mysqli, $sql1)) {


    echo "<meta http-equiv='refresh' content='0;url=../consulta_materia_asig_est.php?pagina=1?update'>";
    }
   }else {
    echo "<meta http-equiv='refresh' content='0;url=../consulta_materia_asig_est.php?pagina=1?coinciden'>";
}

       
?>






