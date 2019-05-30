<?php
include('class.ezpdf.php');
$pdf =& new Cezpdf('a4');
$pdf->selectFont('fonts/Helvetica.afm');
$datacreator = array (
					'Title'=>'Ejemplo PDF',
					'Author'=>'C�sar Cancino',
					'Subject'=>'Ejemplo de PDF',
					'Creator'=>'cancino@otravuelta.cl',
					'Producer'=>'http://cesarcancino.com'
					);
$pdf->addInfo($datacreator);
$pdf->ezText("<b>Ejemplo de PDF en PHP</b>\n",20);
$pdf->ezText("Esta es una prueba de pdf\n",12);
$pdf->ezText("\n\n\n",10);
$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"),10);
$pdf->ezText("<b>Hora:</b> ".date("H:i:s")."\n\n",10);
$pdf->ezStream();
?>

