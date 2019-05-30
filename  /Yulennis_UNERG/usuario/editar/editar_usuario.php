<body background="../../images/auth/register.jpg">
<?php
include("../../conexion.php");
$id_profesor = $_GET['id_profesor'];
$nombre = strtoupper($_GET['nombre']);
$email = strtoupper($_GET['usuario']);
$pwd=$_GET['password'];
$password=hash("sha512",$_GET['password']);


$sql = ("update usuarios_admin set  nombre='$nombre', usuario='$email', password='$password', pwd = '$pwd' where id_profesor = '$id_profesor'");

if (mysqli_query($mysqli, $sql)) {

$sql1 = ("update email set email='$email' where id_profesor = '$id_profesor'");

if (mysqli_query($mysqli, $sql1)) {
	
	echo "<script>alert('Datos de Usuario Modificado, el Sistema automaticamente cerrara tu sesion, luego vuelves a ingresar')</script>";  

    echo "<meta http-equiv='refresh' content='0;url=../../salir.php?msj=actualizado'>";
    }
    }else {
             echo "ERROR: No se ejecuto $sql";
   }  
 
?>

</body>




