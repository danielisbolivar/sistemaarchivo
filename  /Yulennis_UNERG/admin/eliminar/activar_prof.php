<?php
include("../../conexion.php");
$id_profesor = $_GET["id_profesor"];

$sql = ("update profesores set  estatus='activo' where id_profesor = '$id_profesor'");
if (mysqli_query($mysqli, $sql)) {

              echo "<meta http-equiv='refresh' content='0;url=../consulta_general_prof.php?pagina=1?dasabilitado'>";


       }else {
             echo "ERROR: No se ejecuto $sql";

         } 



             
        

?>
