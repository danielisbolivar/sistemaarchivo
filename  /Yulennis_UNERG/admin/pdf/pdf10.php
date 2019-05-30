
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
$tra=new Trabajo10();	
$reg=$tra->get_asistencia();	
//cargamos la información en el array multidimensional llamado data
for ($i=0;$i<sizeof($reg);$i++)
{//inicio for
	$data[]=array
	(
		"cedula_est"=>utf8_decode($reg[$i]["cedula_est"]),
		"nombre_est"=>utf8_decode($reg[$i]["nombre_est"]),
		"apellido_est"=>utf8_decode($reg[$i]["apellido_est"]),
		"nombre_prof"=>utf8_decode($reg[$i]["nombre_prof"]),
		"apellido_prof"=>utf8_decode($reg[$i]["apellido_prof"]),
		"materia"=>utf8_decode($reg[$i]["materia"]),
		"seccion"=>utf8_decode($reg[$i]["seccion"]),
		"fecha_registro"=>utf8_decode($reg[$i]["fecha_registro"])
	
	);
}//fin for
	$titles=array
	(
		"cedula_est"=>"Cedula",
		"nombre_est"=>"Nombres del Estudiante",
		"apellido_est"=>"Apellidos del Estudiante",
		"nombre_prof"=>"Nombres del Profesor",
		"apellido_prof"=>"Apellidos del Profesor",
		"materia"=>"Materia",
		"seccion"=>"Seccion",
		"fecha_registro"=>"Fecha"
	);

$options = array(
              'shadeCol'=>array(0.9,0.9,0.9),//Color de las Celdas.
              'xOrientation'=>'center',//El reporte aparecerá Centrado.
              'width'=>700//Ancho de la Tabla.
            );
//ponemos un título



//salto de linea
$pdf->ezText("",14);
$pdf->ezText("",14);
// titulo

$pdf->ezText("<b>                                                                     Reporte de Asistencia de Estudiantes </b>\n",14);
		

//salto de linea

$pdf->ezText("",14);
$pdf->ezText("",14);
$pdf->ezText("",14);
//creamos la tabla dentro del pdf
$pdf->ezTable($data,$titles,'',$options );
//mostramos el pdf
$pdf->ezStream();

?>
