
<?php
include('../../conexion.php');
$cedula_prof = strtoupper($_POST['cedula_prof']);
$nombre_prof = strtoupper($_POST['nombre_prof']);
$apellido_prof = strtoupper($_POST['apellido_prof']);
$telefono = strtoupper($_POST['telefono']);
$email = strtoupper($_POST['email']);
$direccion = strtoupper($_POST['direccion']);
$password=hash("sha512",$_POST['password']);
$pwd= $_POST['password'];
$sede = strtoupper($_POST['sede']);

// consulta de la tabla profesores
$sql = ("SELECT from profesores");
$result = $mysqli->query($sql);
//$num=$result->num_rows;

// si mi resultado de la consulta es distinto a 0 realizo lo siguiente
if ($result == 0) 
{
  $sql = ("INSERT into profesores(cedula_prof,nombre_prof,apellido_prof,sede,estatus) values
   ('$cedula_prof','$nombre_prof','$apellido_prof','$sede','activo')");


if (mysqli_query($mysqli, $sql)) {
  //recibo el último id
    $ultimo_id = mysqli_insert_id($mysqli); 

    //echo $ultimo_id;

if ($ultimo_id > 0) {
  // inserto en la tabla telefono
  $sql1 = ("INSERT into telefono(id_profesor,id_estudiante,id_responsable,telefono) values
   ('$ultimo_id','0','0','$telefono')");
  if (mysqli_query($mysqli, $sql1)) {

if ($ultimo_id > 0) {
  // inserto en la tabla email
  $sql2 = ("INSERT into email(id_profesor,id_estudiante,id_responsable,email) values
   ('$ultimo_id','0','0','$email')");
  if (mysqli_query($mysqli, $sql2)) {

if ($ultimo_id > 0) {
  // inserto en la tabla direccion
  $sql3 = ("INSERT into direccion(id_profesor,id_estudiante,id_responsable,direccion) values
   ('$ultimo_id','0','0','$direccion')");

  // muestro mensajes 
  if (mysqli_query($mysqli, $sql3)) {

if ($ultimo_id > 0) {
   // insertar en tabla usuarios
  $sql4 = ("INSERT INTO usuarios_admin(id_profesor,nombre,usuario,password,pwd,tipo) values('$ultimo_id','$nombre_prof','$email','$password','$pwd','normal')");

  // muestra mensaje
  if (mysqli_query($mysqli, $sql4)) {
             
             echo "<meta http-equiv='refresh' content='0;url=../registrar_profesores.php?msj=exito'>";
  }else {
             echo "<meta http-equiv='refresh' content='0;url=../registrar_profesores.php?msj=error'>";
           }
        }
       }
      }
     }
    }
   }
  }
 }
}     

?>