<?php
include("../../conexion.php");
$id_prof_materia = $_GET["id_prof_materia"];


$sql = ("delete from prof_materias where id_prof_materia = '$id_prof_materia'");
if (mysqli_query($mysqli, $sql)) {

              echo "<meta http-equiv='refresh' content='0;url=../consulta_materia_asig_prof.php?pagina=1?delete'>";


       }else {
             echo "ERROR: No se ejecuto $sql";

         } 
   


             
        

?>
