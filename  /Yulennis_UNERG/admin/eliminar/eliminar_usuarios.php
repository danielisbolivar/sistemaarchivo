
<?php
include("../../conexion.php");
$id_usuario = $_GET['id_usuario'];

$sql = ("update usuarios_admin set  tipo='desabilitado' where id_usuario = '$id_usuario'");


if (mysqli_query($mysqli, $sql)) {
    echo "<meta http-equiv='refresh' content='0;url=../usuarios.php?msj=desabilitado'>";
    }else {
             echo "ERROR: No se ejecuto $sql";
    }
   
 
?>







