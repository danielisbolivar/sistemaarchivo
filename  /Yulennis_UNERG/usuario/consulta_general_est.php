<?php 
include('menu.php');
include('../conexion.php'); 
?>


<?php 
echo $_SESSION["email"]; 

$sql = 'SELECT * FROM asig_estudiantes';
$result = $mysqli->query($sql);
$num=$result->num_rows;


          while ($fila = $result->fetch_assoc()) {
           

           $mostrar = '10';
           $dividir = ($num / $mostrar);
           $paginas = ceil($dividir);
           //echo $paginas;
}
 
?>

<script type="text/javascript">
  function ConfirmDelete()
  {
    var respuesta = confirm("Estas seguro de Borrar este registro?");
  if (respuesta == true) 
  {
    return true;

  }else{

    return false;
  }
}


</script>




<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
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

                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                    Buscar por Materias
                  </button>

                  <h3 align="center">Consulta General - Estudiantes </h3><hr>
                   <?php include('../alert.php'); ?>
                  <div class="table-responsive">

                  <?php 
                      $pag = $_GET['pagina'];
                      $reg1 = ($pag-1) * $mostrar;

                      $sql = ("SELECT   * FROM estudiantes 
                      	          INNER JOIN asig_estudiantes ON estudiantes.id_estudiante = asig_estudiantes.id_estudiante
                                  INNER JOIN materia ON materia.id_materia = asig_estudiantes.id_materia
                                  INNER JOIN prof_materias ON prof_materias.id_materia = asig_estudiantes.id_materia WHERE asig_estudiantes.id_profesor = '$id'
								  Order by estudiantes.id_estudiante 
								  DESC LIMIT $reg1, $mostrar");

                      $result = $mysqli->query($sql);
                      $consulta= $result->num_rows; 
                  ?>

                    <table class="table table-hover">
                      <thead>
                        <tr bgcolor="#05b911">
                          <th>Cedula</th>
                          <th>Nombres y Apellidos</th>
                          <th>Materia</th>
                          <th>Sección</th>
                          <th>Horario</th>
                        </tr>
                      </thead>
                      <?php while ($reg = $result->fetch_array()){
                                      $num++;
                       ?>
                      <tbody>
                        <tr>
                          <td><?php echo $reg['cedula_est'];?></td>
                          <td>

                          	<?php echo $reg['nombre_est'];?>
                          &nbsp;<?php echo $reg['apellido_est'];?>
                            
                          </td>
                          <td><?php echo $reg['materia'];?></td>
                          <td><?php echo $reg['seccion'];?></td>
                          <td>Desde: <?php echo $reg['hora1'];?><br> Hasta: <?php echo $reg['hora2'];?></td>
                          
                        </tr>
                      </tbody>
                       <?php 
                              }
                       ?>
                    </table>
                  </div>
                </div>
              </div>
            </div>
           <ul class="pagination">             
			<li class="page-item 
			<?php echo $_GET['pagina']<$paginas? 'disabled':'' ?>">
				<a class="page-link" href="consulta_general_est.php?pagina=<?php echo $_GET['pagina']-1 ?>">< Anterior</a></li>  

			<?php for ($i=0;$i< $paginas;$i++): ?>

			 <li class="page-item 
			 <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?>">
				 <a class="page-link" href="consulta_general_est.php?pagina=<?php echo $i+1; ?>">
				 	<?php echo $i+1; ?>
				 </a>
			 </li>

		    <?php endfor ?>

			<li class="page-item
			<?php echo $_GET['pagina']>=$paginas? 'disabled':'' ?>"><a class="page-link" href="consulta_general_est.php?pagina=<?php echo $_GET['pagina']+1 ?>">Siguiente ></a></li>
		  </ul>


<!-- Button to Open the Modal -->


<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Buscar Estudiantes por Materia y Sección</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form class="" action="consulta_general_est1.php" method="GET">
<h2>Elige una Materia</h2><hr>
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

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>



