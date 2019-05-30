<?php
include("../../conexion.php");
$id_observaciones = $_GET["id_observaciones"];


$sql = ("delete from observaciones  where id_observaciones = '$id_observaciones'");
if (mysqli_query($mysqli, $sql)) {

              echo "<meta http-equiv='refresh' content='0;url=../consulta_observaciones.php?pagina=1?delete'>";


       }else {
             echo "ERROR: No se ejecuto $sql";

         } 
   


             
        

?>
