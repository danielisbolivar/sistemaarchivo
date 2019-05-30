
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
$reg=$tra->get_producto_1();	
//cargamos la informaci�n en el array multidimensional llamado data
for ($i=0;$i<sizeof($reg);$i++)
{//inicio for
	$data[]=array
	(
		"cedula_est"=>utf8_decode($reg[$i]["cedula_est"]),
		"nombre_est"=>utf8_decode($reg[$i]["nombre_est"]),
		"apellido_est"=>utf8_decode($reg[$i]["apellido_est"]),
		"materia"=>utf8_decode($reg[$i]["materia"]),
		"seccion"=>utf8_decode($reg[$i]["seccion"])
		
	);
}//fin for
	$titles=array
	(
		"cedula_est"=>"Cedula",
		"nombre_est"=>"Nombres",
		"apellido_est"=>"Apellidos",
		"materia"=>"Materia",
		"seccion"=>"Seccion"
	);

$options = array(
              'shadeCol'=>array(0.9,0.9,0.9),//Color de las Celdas.
              'xOrientation'=>'center',//El reporte aparecer� Centrado.
              'width'=>700//Ancho de la Tabla.
            );
//ponemos un t�tulo



//salto de linea
$pdf->ezText("",14);
$pdf->ezText("",14);
// titulo

$pdf->ezText("<b>                                                                                     Lista de Estudiantes </b>\n",14);	
//salto de linea

$pdf->ezText("",14);
$pdf->ezText("",14);
$pdf->ezText("",14);
//creamos la tabla dentro del pdf
$pdf->ezTable($data,$titles,'',$options );
//mostramos el pdf
$pdf->ezStream();

?>
