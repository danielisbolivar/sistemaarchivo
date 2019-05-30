
<?php
include("../../conexion.php");
$id_profesor = $_GET['id_profesor'];
$nombre_prof = strtoupper($_GET['nombre_prof']);
$apellido_prof = strtoupper($_GET['apellido_prof']);
$telefono = strtoupper($_GET['telefono']);
$email = strtoupper($_GET['email']);
$direccion = strtoupper($_GET['direccion']);
$sede = strtoupper($_GET['sede']);

$sql = ("update profesores set  nombre_prof='$nombre_prof', apellido_prof='$apellido_prof', sede='$sede' where id_profesor = '$id_profesor'");




if (mysqli_query($mysqli, $sql)) {

$sql1 = ("update telefono set telefono='$telefono' where id_profesor = '$id_profesor'");
if (mysqli_query($mysqli, $sql1)) {
$sql2 = ("update email set email='$email' where id_profesor = '$id_profesor'");
if (mysqli_query($mysqli, $sql2)) {
$sql3 = ("update direccion set direccion='$direccion' where id_profesor = '$id_profesor'");
if (mysqli_query($mysqli, $sql3)) {
$sql4 = ("update usuarios_admin set usuario='$email' where id_profesor = '$id_profesor'"); 
if (mysqli_query($mysqli, $sql4)) {
    echo "<meta http-equiv='refresh' content='0;url=../consulta_general_prof.php?pagina=1?update'>";
    }else {
             echo "ERROR: No se ejecuto $sql";
    }
   }
  }
 }
}
        
   

       
     ?>






