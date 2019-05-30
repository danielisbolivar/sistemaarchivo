<body background="../../images/auth/register.jpg">
<?php
include("../../conexion.php");
$id_usuario = $_GET['id_usuario'];
$nombre = strtoupper($_GET['nombre']);
$email = strtoupper($_GET['usuario']);
$pwd=$_GET['password'];
$password=hash("sha512",$_GET['password']);


$sql = ("update usuarios_admin set  nombre='$nombre', usuario='$email', password='$password', pwd = '$pwd' where id_usuario = '$id_usuario'");

if (mysqli_query($mysqli, $sql)) {

	echo "<script>alert('Datos de Usuario Modificado, el Sistema automaticamente cerrara tu sesion, luego vuelves a ingresar')</script>";  

    echo "<meta http-equiv='refresh' content='0;url=../../salir.php?msj=actualizado'>";
    }else {
             echo "ERROR: No se ejecuto $sql";
   }  
 
?>
</body>




