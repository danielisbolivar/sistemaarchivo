<?php
include("../../conexion.php");
$id_estudiante = $_GET["id_estudiante"];

$sql = ("delete from estudiantes  where id_estudiante = '$id_estudiante'");
if (mysqli_query($mysqli, $sql)) {

$sql1 = ("delete from telefono  where id_estudiante = '$id_estudiante'");
if (mysqli_query($mysqli, $sql1)) {

$sql2 = ("delete from email  where id_estudiante = '$id_estudiante'");
if (mysqli_query($mysqli, $sql2)) {

$sql3 = ("delete from direccion  where id_estudiante = '$id_estudiante'");
if (mysqli_query($mysqli, $sql3)) {

              echo "<meta http-equiv='refresh' content='0;url=../consulta_general_est.php?pagina=1?delete'>";


       }else {
             echo "ERROR: No se ejecuto $sql";

         } 
     }
   }
 }



             
        

?>
