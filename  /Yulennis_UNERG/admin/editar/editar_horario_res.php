
<?php
include("../../conexion.php");
$id_prof_materia = $_GET['id_prof_materia'];
$id_responsable = strtoupper($_GET['id_responsable']);
$dia = strtoupper($_GET['dia']);
$hora1 = strtoupper($_GET['hora1']);
$hora2 = strtoupper($_GET['hora2']);
$aula_lab = strtoupper($_GET['aula_lab']);

// consulta de la tabla profesores
$sql = ("SELECT hora1,hora2,dia,aula_lab FROM prof_materias WHERE (hora1>='$hora1' AND hora1<='$hora2') AND (hora2>='$hora1' AND hora2<='$hora2') AND (dia = '$dia' AND aula_lab = '$aula_lab')");

$result = $mysqli->query($sql);
$num = $result->num_rows;

// si mi resultado de la consulta es distinto a 0 realizo lo siguiente

if ($num == 0) {

$sql1 = ("update prof_materias set  id_responsable='$id_responsable', dia='$dia', hora1='$hora1', hora2='$hora2', aula_lab='$aula_lab' where id_prof_materia = '$id_prof_materia'");

if (mysqli_query($mysqli, $sql1)) {


    echo "<meta http-equiv='refresh' content='0;url=../consulta_horario_res.php?pagina=1?update'>";
    }
   }else {
    echo "<meta http-equiv='refresh' content='0;url=../consulta_horario_res.php?pagina=1?coinciden'>";
}

       
?>






