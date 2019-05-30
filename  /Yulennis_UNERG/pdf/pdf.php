<?php
require_once("class/class.php");
require_once("class.ezpdf.php");

$pdf =& new Cezpdf('a3');
//seleccionamos la fuente
$pdf->selectFont('fonts/Helvetica.afm');

//seteamos la informaci�n del documento que se crear�
$datacreator = array (
					'Title'=>'Reporte PDF',
					'Author'=>'C�sar Cancino',
					'Subject'=>'Reporte Din�mico con PHP y Mysql Exportado a PDF',
					'Creator'=>'cancino@otravuelta.cl',
					'Producer'=>'http://www.cesarcancino.com'
					);
$pdf->addInfo($datacreator);	

//traemos la data de nuestra base de datos
$tra=new Trabajo();	
$reg=$tra->get_usuario();	
//cargamos la informaci�n en el array multidimensional llamado data
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
		"email"=>"EMAIL � CORREO"
	);

$options = array(
              'shadeCol'=>array(0.9,0.9,0.9),//Color de las Celdas.
              'xOrientation'=>'center',//El reporte aparecer� Centrado.
              'width'=>700//Ancho de la Tabla.
            );
//ponemos un t�tulo

$pdf->ezText("<b>REPORTE DE USUARIOS ADMINISTRADORES</b>\n",12);	
//creamos la tabla dentro del pdf
$pdf->ezTable($data,$titles,'',$options );
//mostramos el pdf
$pdf->ezStream();

?>