
<?php
include("../../conexion.php");
$id_estudiante = $_GET['id_estudiante'];
$nombre_est = strtoupper($_GET['nombre_est']);
$apellido_est = strtoupper($_GET['apellido_est']);
$telefono = strtoupper($_GET['telefono']);
$email = strtoupper($_GET['email']);
$direccion = strtoupper($_GET['direccion']);
$sede = strtoupper($_GET['sede']);

$sql = ("update estudiantes set  nombre_est='$nombre_est', apellido_est='$apellido_est', sede='$sede' where id_estudiante = '$id_estudiante'");




if (mysqli_query($mysqli, $sql)) {

$sql1 = ("update telefono set telefono='$telefono' where id_estudiante = '$id_estudiante'");
if (mysqli_query($mysqli, $sql1)) {
$sql2 = ("update email set email='$email' where id_estudiante = '$id_estudiante'");
if (mysqli_query($mysqli, $sql2)) {
$sql3 = ("update direccion set direccion='$direccion' where id_estudiante = '$id_estudiante'");  
if (mysqli_query($mysqli, $sql3)) {
    echo "<meta http-equiv='refresh' content='0;url=../consulta_general_est.php?pagina=1?update'>";
    }else {
             echo "ERROR: No se ejecuto $sql";
   }
  }
 }
}
        
   

       
     ?>






