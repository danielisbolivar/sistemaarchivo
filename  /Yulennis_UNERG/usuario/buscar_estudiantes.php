<?php 
include('menu.php');
include('../conexion.php'); 
?>
<br><br>
<h2>Control de Asistencia</h2><hr style="height:1px;color:#15c043;background-color:#15c043;" /><br><br>
<div class="container">
  <div class="row">
    <div class="col-sm-6">

<form class="form-control" action="asistencia_est.php" method="GET">
<h4>Elige una Materia</h4><hr>
<label for="exampleInputEmail1">Eligue una Materia</label>
 <?php 
                    $usuario = $_SESSION["usuario"];
                    $sql = ("SELECT * FROM usuarios_admin WHERE usuario ='$usuario'");
                     $result = $mysqli->query($sql);
                     $consulta= $result->num_rows;
                     while ($reg = $result->fetch_array()){
                                      $num++;

                      $id = $reg['id_profesor'];          

                     }
 ?>                         
 <?php
    $sql=("SELECT * FROM profesores 
    	           INNER JOIN prof_materias ON profesores.id_profesor = prof_materias.id_profesor
    	           INNER JOIN materia ON materia.id_materia = prof_materias.id_materia WHERE prof_materias.id_profesor = '$id'");
    $result = $mysqli->query($sql);
    $consulta= $result->num_rows; 
 ?>

  <select name="id_materia" class="form-control" onchange="pedirDatos()" required >
    <option value="">Selecciona una Materia</option>
    <?php while ($reg = $result->fetch_array()){
        $num++;
                                      
      echo "<option value=\"".$reg['id_materia']."\">".$reg['materia']."</option> \n";
                                      
 }
 ?>
 </select> <br>


 <label>Selecciona Una Sección</label>
 <select name="seccion" class="form-control">
 	<option value="">Seleccione</option>
 	<option value="1">1</option>
 	<option value="2">2</option>
 </select>
 <br>
 <button class="btn btn-primary">Continuar</button>
 </form>

  </div>
  </div>
</div>

<br><br><br><br>
<?php include('../footer.php'); ?>