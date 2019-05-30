<?php
include("../../conexion.php");
$id_profesor = $_GET["id_profesor"];

$sql = ("delete from profesores  where id_profesor = '$id_profesor'");
if (mysqli_query($mysqli, $sql)) {

$sql1 = ("delete from telefono  where id_profesor = '$id_profesor'");
if (mysqli_query($mysqli, $sql1)) {

$sql2 = ("delete from email  where id_profesor = '$id_profesor'");
if (mysqli_query($mysqli, $sql2)) {

$sql3 = ("delete from direccion  where id_profesor = '$id_profesor'");
if (mysqli_query($mysqli, $sql3)) {

              echo "<meta http-equiv='refresh' content='0;url=../consulta_general_prof.php?pagina=1?delete'>";


       }else {
             echo "ERROR: No se ejecuto $sql";

         } 
     }
   }
 }



             
        

?>
