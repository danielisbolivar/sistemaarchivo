
<?php
include('../../conexion.php');
$codigo = strtoupper($_POST['codigo']);
$materia = strtoupper($_POST['materia']);


// consulta de la tabla profesores
$sql = ("SELECT from profesores");
$result = $mysqli->query($sql);
//$num=$result->num_rows;

// si mi resultado de la consulta es distinto a 0 realizo lo siguiente
if ($result == 0) 
{
  $sql = ("INSERT into materia(codigo,materia) values
   ('$codigo','$materia')");

  // muestro mensajes 
  if (mysqli_query($mysqli, $sql)) {
    
            echo "<meta http-equiv='refresh' content='0;url=../consulta_materia.php?pagina=1?exito'>";

      }else {
             echo "<meta http-equiv='refresh' content='0;url=../consulta_materia.php?pagina=1?error'>";
           }
      }
       

?>