<body background="images/auth/register.jpg">
<?php session_start();
?>
<?php


include("conexion.php");
$usuario = $_POST["usuario"];
$password = hash('sha512',$_POST["password"]);

$sql= ("select * from usuarios_admin where usuario='$usuario' and password='$password' and tipo = 'administrador'");


$result=$mysqli->query($sql);
$num = $result->num_rows;

if ($num>0 ){
    $row = mysqli_fetch_array($result);
 
    $_SESSION["aut"]="si";
    $_SESSION["tipo"]="tipo";
    
    $_SESSION["nombre"]=$row["nombre"];
    $_SESSION["usuario"]=$row["usuario"];
    echo "<meta http-equiv='refresh' content='0;url=admin/home.php'>";
    
}else{

$sql= ("select * from usuarios_admin where usuario='$usuario' and password='$password' and tipo = 'normal'");


$result=$mysqli->query($sql);
$num = $result->num_rows;

if ($num>0 ){
    $row = mysqli_fetch_array($result);
 
    $_SESSION["aut"]="si";
    $_SESSION["tipo"]="tipo";
    
    $_SESSION["nombre"]=$row["nombre"];
    $_SESSION["usuario"]=$row["usuario"];
    echo "<meta http-equiv='refresh' content='0;url=usuario/home.php'>";
    
}

else{

 echo "<meta http-equiv='refresh' content='0;url=login.php?msj=invalide'>";
 }
}
?>
</body>