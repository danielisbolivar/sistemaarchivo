<?php
	require ('../../../conexion.php');
	
	$id_materia = $_POST['id_materia'];
	
	$query = "SELECT seccion FROM prof_materias WHERE id_materia = '$id_materia'";



	$resultado=$mysqli->query($query);
	
	while($row = $resultado->fetch_assoc())
	{
		$html.= "<option value='".$row['id_prof_materia']."'>".$row['seccion']."</option>";
	}
	echo $html;
?>