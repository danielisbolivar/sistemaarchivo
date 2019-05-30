
<?php
include('../../conexion.php');
$id_profesor = strtoupper($_GET['id_profesor']);
$id_materia = strtoupper($_GET['id_materia']);
$seccion = strtoupper($_GET['seccion']);
$dia = strtoupper($_GET['dia']);
$hora1 = strtoupper($_GET['hora1']);
$hora2 = strtoupper($_GET['hora2']);
$aula_lab = strtoupper($_GET['aula_lab']);



// consulta de la tabla profesores
$sql = ("SELECT hora1,hora2,dia,aula_lab,seccion,id_profesor FROM prof_materias WHERE (hora1>='$hora1' AND hora1<='$hora2') AND (hora2>='$hora1' AND hora2<='$hora2') AND (dia = '$dia' AND aula_lab = '$aula_lab' AND seccion = '$seccion' AND id_profesor = '$id_profesor')");


$result = $mysqli->query($sql);
$num = $result->num_rows;

// si mi resultado de la consulta es distinto a 0 realizo lo siguiente

if ($num == 0) {

	//echo "registrar";
	$sql = ("INSERT into prof_materias(id_profesor,id_responsable,id_materia,seccion,dia,hora1,hora2,aula_lab) values
   ('$id_profesor','0','$id_materia','$seccion','$dia','$hora1','$hora2','$aula_lab')");

  // muestro mensajes 
  if (mysqli_query($mysqli, $sql)) {
    
            echo "<meta http-equiv='refresh' content='0;url=../asignar_materia_prof.php?msj=asignado'>";

      }

}else{

	echo "<meta http-equiv='refresh' content='0;url=../asignar_materia_prof.php?msj=ocupado'>";

}
/*{
  $sql = ("INSERT into prof_materias(id_profesor,id_materia,seccion,dia,hora1,hora2,aula_lab) values
   ('$id_profesor','$id_materia','$seccion','$dia','$hora1','$hora2','$aula_lab')");

  // muestro mensajes 
  if (mysqli_query($mysqli, $sql)) {
    
            echo "<meta http-equiv='refresh' content='0;url=../asignar_materia_prof.php?msj=exito'>";

      }else {
             echo "<meta http-equiv='refresh' content='0;url=../asignar_materia_prof.php?msj=error'>";
           }
      }
      
*/

      
?>