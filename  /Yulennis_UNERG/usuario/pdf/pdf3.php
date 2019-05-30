
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
$tra=new Trabajo3();	
$reg=$tra->get_producto_4();	
//cargamos la información en el array multidimensional llamado data
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
		"ubicacion"=>"Ubicacion",
		"cantidad"=>"Cantidad"
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

$pdf->ezText("<b>                                         Inventario de Equipos y Productos en las Sede de la UNERG AIS</b>\n",14);	
$pdf->ezText("<b>                                                                    Detallado por: Sede de la UNERG</b>\n",14);
//salto de linea

$pdf->ezText("",14);
$pdf->ezText("",14);
$pdf->ezText("",14);
//creamos la tabla dentro del pdf
$pdf->ezTable($data,$titles,'',$options );
//mostramos el pdf
$pdf->ezStream();

?>
