<?php
require_once('../class.ezpdf.php');
 
 $bd_host = "localhost"; 
	$bd_usuario = "root"; 
	$bd_password = ""; 
	$bd_base = "informatica_unerg"; 
	$con = mysql_connect($bd_host, $bd_usuario, $bd_password) or die("Error con la conexión"); 
	mysql_select_db($bd_base, $con) or die("Error al seleccionar db");
	$sql="SELECT * FROM productos";
	
	$resSql=mysql_query($sql) or die("<br>Error consulta</br>".mysql_error());
	
$pdf = new Cezpdf('A4');
$pdf->selectFont('fonts/Helvetica.afm');
	
	while($row=mysql_fetch_row($resSql)){
		$data[]=array('Codigo'=>$row[0], 'Equipo'=>$row[1],'Cantidad'=>$row[2],'Categoria'=>$row[3],'Sede donde se encuentra'=>$row[5],'Estado del Equipo'=>$row[6]);
	}
	$titles=array('Depto'=>'Depto', 'num_tickets'=>'Tickets','abiertos'=>'abiertos','cerrados'=>'cerrados');
	/*
$data[] = array('pais'=>'Peru', 'capital'=>'Lima');
$data[] = array('pais'=>'Colombia', 'capital'=>'Bogota');
$data[] = array('pais'=>'Chile', 'capital'=>'Santiago de Chile');
$data[] = array('pais'=>'Brasil', 'capital'=>'Brasilia');
$data[] = array('pais'=>'Ecuador', 'capital'=>'Quito');
$data[] = array('pais'=>'Bolivia', 'capital'=>'La Paz');
$data[] = array('pais'=>'Argentina', 'capital'=>'Buenos Aires');
$data[] = array('pais'=>'Guyana', 'capital'=>'Georgetown');
$data[] = array('pais'=>'Surinam', 'capital'=>'Paramaribo');
$data[] = array('pais'=>'Uruguay', 'capital'=>'Montevideo');
$data[] = array('pais'=>'Paraguay', 'capital'=>'Asuncion');
$data[] = array('pais'=>'Venezuela', 'capital'=>'Caracas');
 
$titles = array('pais'=>'<b>Pais</b>', 'capital'=>'<b>Capital</b>');*/
 
$pdf->ezTable($data);
$pdf->ezStream();
?>