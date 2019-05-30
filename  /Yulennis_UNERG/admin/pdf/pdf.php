
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
		"codigo_producto"=>utf8_decode($reg[$i]["codigo_producto"]),
		"nombre_equipo"=>utf8_decode($reg[$i]["nombre_equipo"]),
		"marca"=>utf8_decode($reg[$i]["marca"]),
		"categoria"=>utf8_decode($reg[$i]["categoria"]),
		"estado"=>utf8_decode($reg[$i]["estado"]),
		"sede"=>utf8_decode($reg[$i]["sede"]),
		"detalle"=>utf8_decode($reg[$i]["detalle"]),
		"ubicacion"=>utf8_decode($reg[$i]["ubicacion"]),
		"cantidad"=>utf8_decode($reg[$i]["cantidad"])
	);
}//fin for
	$titles=array
	(
		"codigo_producto"=>"Codigo",
		"nombre_equipo"=>"Equipo",
		"marca"=>"Marca",
		"categoria"=>"Categoria",
		"estado"=>"Estado",
		"sede"=>"Sede",
		"detalle"=>"Detalle",
		"ubicacion"=>"Ubicaci�n",
		"cantidad"=>"Cantidad"
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

$pdf->ezText("<b>                                         Inventario General de Equipos y Productos en las Sede de la UNERG AIS</b>\n",14);	
//salto de linea
$pdf->ezText("<b>                                                                       San Juan de los Morros - Ortiz y Mellado</b>",14);
$pdf->ezText("",14);
$pdf->ezText("",14);
$pdf->ezText("",14);
//creamos la tabla dentro del pdf
$pdf->ezTable($data,$titles,'',$options );
//mostramos el pdf
$pdf->ezStream();

?>
