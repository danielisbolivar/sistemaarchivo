
<?php
include("../../conexion.php");
$id_responsable = $_GET['id_responsable'];
$nombre_res = strtoupper($_GET['nombre_res']);
$apellido_res = strtoupper($_GET['apellido_res']);
$telefono = strtoupper($_GET['telefono']);
$email = strtoupper($_GET['email']);
$direccion = strtoupper($_GET['direccion']);
$sede = strtoupper($_GET['sede']);

$sql = ("update responsables set  nombre_res='$nombre_res', apellido_res='$apellido_res', sede='$sede' where id_responsable = '$id_responsable'");




if (mysqli_query($mysqli, $sql)) {

$sql1 = ("update telefono set telefono='$telefono' where id_responsable = '$id_responsable'");
if (mysqli_query($mysqli, $sql1)) {
$sql2 = ("update email set email='$email' where id_responsable = '$id_responsable'");
if (mysqli_query($mysqli, $sql2)) {
$sql3 = ("update direccion set direccion='$direccion' where id_responsable = '$id_responsable'");  
if (mysqli_query($mysqli, $sql3)) {
    echo "<meta http-equiv='refresh' content='0;url=../consulta_general_res.php?pagina=1?update'>";
    }else {
             echo "ERROR: No se ejecuto $sql";
   }
  }
 }
}
        
   

       
     ?>






