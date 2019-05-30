<?php
require_once("DBController.php");
$db_handle = new DBController();


if(!empty($_POST["cedula_prof"])) {
  $query = "SELECT * FROM profesores WHERE cedula_prof='" . $_POST["cedula_prof"] . "'";
  $user_count = $db_handle->numRows($query);
  if($user_count>0) {
      echo "<span class='estado-no-disponible-usuario'> Ya existe un registro con esta Cedula.</span>";
  }else{
      echo "<span class='estado-disponible-usuario'> Continua con el Registro.</span>";
  }
}

if(!empty($_POST["cedula_est"])) {
  $query = "SELECT * FROM estudiantes WHERE cedula_est='" . $_POST["cedula_est"] . "'";
  $user_count = $db_handle->numRows($query);
  if($user_count>0) {
      echo "<span class='estado-no-disponible-usuario'> Ya existe un registro con esta Cedula.</span>";
  }else{
      echo "<span class='estado-disponible-usuario'> Continua con el Registro.</span>";
  }
}

if(!empty($_POST["cedula_res"])) {
  $query = "SELECT * FROM responsables WHERE cedula_res='" . $_POST["cedula_res"] . "'";
  $user_count = $db_handle->numRows($query);
  if($user_count>0) {
      echo "<span class='estado-no-disponible-usuario'> Ya existe un registro con esta Cedula.</span>";
  }else{
      echo "<span class='estado-disponible-usuario'> Continua con el Registro.</span>";
  }
}

if(!empty($_POST["codigo"])) {
  $query = "SELECT * FROM materia WHERE codigo='" . $_POST["codigo"] . "'";
  $user_count = $db_handle->numRows($query);
  if($user_count>0) {
      echo "<span class='estado-no-disponible-usuario'> Codigo de Materia Registrado.</span>";
  }else{
      echo "<span class='estado-disponible-usuario'> Continua con el Registro.</span>";
  }
}

if(!empty($_POST["codigo_producto"])) {
  $query = "SELECT * FROM productos WHERE codigo_producto='" . $_POST["codigo_producto"] . "'";
  $user_count = $db_handle->numRows($query);
  if($user_count>0) {
      echo "<span class='estado-no-disponible-usuario'> Ya hay un registro con ese Codigo.</span>";
  }else{
      echo "<span class='estado-disponible-usuario'> Continua con el Registro.</span>";
  }
}




if(!empty($_POST["email"])) {
  $query = "SELECT * FROM email WHERE email='" . $_POST["email"] . "'";
  $user_count = $db_handle->numRows($query);
  if($user_count>0) {
      echo "<span class='estado-no-disponible-correo'> correo no Disponible esta en Uso.</span>";
  }else{
      echo "<span class='estado-disponible-correo'>Disponible.</span>";
  }
}
?>