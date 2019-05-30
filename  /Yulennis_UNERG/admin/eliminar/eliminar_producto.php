<?php
include("../../conexion.php");
$id_producto = $_GET["id_producto"];


$sql = ("delete from productos  where id_producto = '$id_producto'");
if (mysqli_query($mysqli, $sql)) {

              echo "<meta http-equiv='refresh' content='0;url=../consulta_producto.php?pagina=1?delete'>";


       }else {
             echo "ERROR: No se ejecuto $sql";

         } 
   


             
        

?>
