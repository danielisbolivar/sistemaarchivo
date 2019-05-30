
<?php
include('../../conexion.php');
$id_estudiante = strtoupper($_POST['id_estudiante']);
$id_profesor = strtoupper($_POST['profesor']);
$id_materia = strtoupper($_POST['materia']);
$seccion = strtoupper($_POST['seccion']);




// consulta de la tabla profesores
$sql = ("SELECT id_estudiante, id_profesor, id_materia, seccion FROM asig_estudiantes WHERE (id_estudiante = '$id_estudiante' AND id_profesor = '$id_profesor' AND id_materia = '$id_materia' AND seccion = '$seccion')");


$result = $mysqli->query($sql);
$num = $result->num_rows;

// si mi resultado de la consulta es distinto a 0 realizo lo siguiente

if ($num == 0) {

	//echo "registrar";
	$sql = ("INSERT into asig_estudiantes(id_estudiante, id_profesor, id_materia, seccion) values
   ('$id_estudiante','$id_profesor','$id_materia','$seccion')");

  // muestro mensajes 
  if (mysqli_query($mysqli, $sql)) {
    
            echo "<meta http-equiv='refresh' content='0;url=../asignar_materia_est.php?msj=asignadoo'>";

      }

}else{

	echo "<meta http-equiv='refresh' content='0;url=../asignar_materia_est.php?msj=ney'>";

}


      
?>