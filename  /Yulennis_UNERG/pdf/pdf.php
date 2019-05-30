<?php
require_once("class/class.php");
require_once("class.ezpdf.php");

$pdf =& new Cezpdf('a3');
//seleccionamos la fuente
$pdf->selectFont('fonts/Helvetica.afm');

//seteamos la información del documento que se creará
$datacreator = array (
					'Title'=>'Reporte PDF',
					'Author'=>'César Cancino',
					'Subject'=>'Reporte Dinámico con PHP y Mysql Exportado a PDF',
					'Creator'=>'cancino@otravuelta.cl',
					'Producer'=>'http://www.cesarcancino.com'
					);
$pdf->addInfo($datacreator);	

//traemos la data de nuestra base de datos
$tra=new Trabajo();	
$reg=$tra->get_usuario();	
//cargamos la información en el array multidimensional llamado data
for ($i=0;$i<sizeof($reg);$i++)
{//inicio for
	$data[]=array
	(
		"nombre"=>utf8_decode($reg[$i]["nombre"]),
		"email"=>utf8_decode($reg[$i]["email"])
	);
}//fin for
	$titles=array
	(
		"nombre"=>"NOMBRE DEL ADMINISTRADOR",
		"email"=>"EMAIL Ó CORREO"
	);

$options = array(
              'shadeCol'=>array(0.9,0.9,0.9),//Color de las Celdas.
              'xOrientation'=>'center',//El reporte aparecerá Centrado.
              'width'=>700//Ancho de la Tabla.
            );
//ponemos un título

$pdf->ezText("<b>REPORTE DE USUARIOS ADMINISTRADORES</b>\n",12);	
//creamos la tabla dentro del pdf
$pdf->ezTable($data,$titles,'',$options );
//mostramos el pdf
$pdf->ezStream();

?>