
<?php
include("../../conexion.php");
$id_usuario = $_GET['id_usuario'];
$nombre = strtoupper($_GET['nombre']);
$usuario = strtoupper($_GET['usuario']);
$pwd=$_GET['password'];
$password=hash("sha512",$_GET['password']);


$sql = ("update usuarios_admin set  nombre='$nombre', usuario='$usuario', password = '$password', pwd = '$pwd' where id_usuario = '$id_usuario'");


if (mysqli_query($mysqli, $sql)) {
    echo "<meta http-equiv='refresh' content='0;url=../usuarios.php?msj=update'>";
    }else {
             echo "ERROR: No se ejecuto $sql";
    }
   
 
?>






