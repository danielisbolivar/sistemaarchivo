
<?php
include('../../conexion.php');
$cedula_res = strtoupper($_POST['cedula_res']);
$nombre_res = strtoupper($_POST['nombre_res']);
$apellido_res = strtoupper($_POST['apellido_res']);
$telefono = strtoupper($_POST['telefono']);
$email = strtoupper($_POST['email']);
$direccion = strtoupper($_POST['direccion']);
$sede = strtoupper($_POST['sede']);

// consulta de la tabla profesores
$sql = ("SELECT from responsables");
$result = $mysqli->query($sql);
//$num=$result->num_rows;

// si mi resultado de la consulta es distinto a 0 realizo lo siguiente
if ($result == 0) 
{
  $sql = ("INSERT into responsables(cedula_res,nombre_res,apellido_res,sede,estatus) values
   ('$cedula_res','$nombre_res','$apellido_res','$sede','activo')");


if (mysqli_query($mysqli, $sql)) {
  //recibo el último id
    $ultimo_id = mysqli_insert_id($mysqli); 

    //echo $ultimo_id;

if ($ultimo_id > 0) {
  // inserto en la tabla telefono
  $sql1 = ("INSERT into telefono(id_profesor,id_estudiante,id_responsable,telefono) values
   ('0','0','$ultimo_id','$telefono')");
  if (mysqli_query($mysqli, $sql1)) {

if ($ultimo_id > 0) {
  // inserto en la tabla email
  $sql2 = ("INSERT into email(id_profesor,id_estudiante,id_responsable,email) values
   ('0','0','$ultimo_id','$email')");
  if (mysqli_query($mysqli, $sql2)) {

if ($ultimo_id > 0) {
  // inserto en la tabla direccion
  $sql3 = ("INSERT into direccion(id_profesor,id_estudiante,id_responsable,direccion) values
   ('0','0','$ultimo_id','$direccion')");

  // muestro mensajes 
  if (mysqli_query($mysqli, $sql3)) {
    
            echo "<meta http-equiv='refresh' content='0;url=../registrar_responsable.php?msj=exito'>";

      }else {
             echo "<meta http-equiv='refresh' content='0;url=../registrar_responsable.php?msj=error'>";
           }
      }
     }
    }
   }
  }
 }
}
         

?>