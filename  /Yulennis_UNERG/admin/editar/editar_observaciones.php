
<?php
include("../../conexion.php");
$id_observaciones = $_GET['id_observaciones'];
$id_profesor = strtoupper($_GET['id_profesor']);
$seccion = strtoupper($_GET['seccion']);
$observaciones = strtoupper($_GET['observaciones']);


$sql = ("update observaciones set  id_profesor='$id_profesor', seccion='$seccion', observaciones='$observaciones' where id_observaciones = '$id_observaciones'");

if (mysqli_query($mysqli, $sql)) {


    echo "<meta http-equiv='refresh' content='0;url=../consulta_observaciones.php?pagina=1?update'>";
    }else {
             echo "ERROR: No se ejecuto $sql";
   }

        
   

       
     ?>






