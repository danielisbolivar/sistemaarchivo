<?php
include("../../conexion.php");
$id_asig_est = $_GET["id_asig_est"];


$sql = ("delete from asig_estudiantes where id_asig_est = '$id_asig_est'");
if (mysqli_query($mysqli, $sql)) {

              echo "<meta http-equiv='refresh' content='0;url=../consulta_materia_asig_est.php?pagina=1?delete'>";


       }else {
             echo "ERROR: No se ejecuto $sql";

         } 
   


             
        

?>
