
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
$tra=new Trabajo9();	
$reg=$tra->get_responsable_1();	
//cargamos la información en el array multidimensional llamado data
for ($i=0;$i<sizeof($reg);$i++)
{//inicio for
	$data[]=array
	(
		"cedula_res"=>utf8_decode($reg[$i]["cedula_res"]),
		"nombre_res"=>utf8_decode($reg[$i]["nombre_res"]),
		"apellido_res"=>utf8_decode($reg[$i]["apellido_res"]),
		"telefono"=>utf8_decode($reg[$i]["telefono"]),
		"email"=>utf8_decode($reg[$i]["email"]),
		"direccion"=>utf8_decode($reg[$i]["direccion"]),
		"sede"=>utf8_decode($reg[$i]["sede"])
	
	);
}//fin for
	$titles=array
	(
		"cedula_res"=>"Cedula",
		"nombre_res"=>"Nombres",
		"apellido_res"=>"Apellidos",
		"telefono"=>"Telefono",
		"email"=>"Correo",
		"direccion"=>"Direccion",
		"sede"=>"Sede"
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

$pdf->ezText("<b>                                                                     Reporte Detallado por Sede de la UNERG </b>\n",14);
$pdf->ezText("<b>                                                                  Personas Responsables de los laboratorios</b>\n",14);		

//salto de linea

$pdf->ezText("",14);
$pdf->ezText("",14);
$pdf->ezText("",14);
//creamos la tabla dentro del pdf
$pdf->ezTable($data,$titles,'',$options );
//mostramos el pdf
$pdf->ezStream();

?>
