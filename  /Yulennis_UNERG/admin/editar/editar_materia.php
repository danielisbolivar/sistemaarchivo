
<?php
include("../../conexion.php");
$id_materia = $_GET['id_materia'];
$codigo = strtoupper($_GET['codigo']);
$materia = strtoupper($_GET['materia']);


$sql = ("update materia set  codigo='$codigo', materia='$materia' where id_materia = '$id_materia'");

if (mysqli_query($mysqli, $sql)) {


    echo "<meta http-equiv='refresh' content='0;url=../consulta_materia.php?pagina=1?update'>";
    }else {
             echo "ERROR: No se ejecuto $sql";
   }

        
   

       
     ?>






