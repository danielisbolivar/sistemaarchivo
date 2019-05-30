
<?php
include("../../conexion.php");
$id_observaciones = $_GET['id_observaciones'];
$id_responsable = strtoupper($_GET['id_responsable']);
$observaciones = strtoupper($_GET['observaciones']);


$sql = ("update observaciones set  id_responsable='$id_responsable', observaciones='$observaciones' where id_observaciones = '$id_observaciones'");

if (mysqli_query($mysqli, $sql)) {


    echo "<meta http-equiv='refresh' content='0;url=../consulta_observaciones1.php?pagina=1?update'>";
    }else {
             echo "ERROR: No se ejecuto $sql";
   }

        
   

       
     ?>






