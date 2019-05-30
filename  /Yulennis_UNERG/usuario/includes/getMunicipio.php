<?php
	
   require ('../../conexion.php');
	
   $id_profesor = $_POST['id_profesor'];
	

   $queryM = ("SELECT   * FROM prof_materias 
                      	          INNER JOIN materia ON prof_materias.id_materia = materia.id_materia
								  WHERE prof_materias.id_profesor = '$id_profesor'
								  Order by materia.materia 
								  ASC");


	$resultadoM = $mysqli->query($queryM);
	
	$html= "<option value='0'>Seleccionar una Materia</option>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['id_materia']."'>".$rowM['materia']."</option>";
	}
	
	echo $html;
?>		