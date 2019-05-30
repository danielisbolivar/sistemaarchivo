<?php 
include('menu.php');
include('../conexion.php'); 
?>


<?php 
echo $_SESSION["email"];
$fecha1 = $_GET['fecha1']; 
$fecha2 = $_GET['fecha2']; 
$sql = "SELECT * FROM asistencia_est WHERE fecha_registro>='$fecha1' AND fecha_registro<='$fecha2'";
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


                  <div class="container">
                    <div class="row">
                      <form action="buscar_por_fecha.php" method="GET" class="form-inline">
                      <div class="col-sm-8">

                        <h4>Consultar por Fecha</h4><hr>
                        <input type="date" name="fecha1" class="form-control" required="">
                        <input type="date" name="fecha2"  class="form-control" required=""><hr>
                        <button type="submit" class="btn btn-primary">Buscar</button>
                      </div>
                      </form>
                    </div>
                  </div>
                  <br>
                  

                  <h3 align="center">Consulta de Asistencia de Estudiantes </h3>
                  <div style="float:right">
                    <a id="add_row" class="btn btn-inverse-primary" href="pdf/pdf1.php?id=<?php echo $id ?>&fecha1=<?php echo $fecha1 ?>&fecha2=<?php echo $fecha2 ?>" target="nuevo">Generar <i class="mdi mdi-file-pdf-box"></i>
                      <span class="glyphicon glyphicon-plus"></span>
                    </a> 
                  </div><br>
                  <hr>
                   <?php include('../alert.php'); ?>
                  <div class="table-responsive">

                  <?php 
                      $pag = $_GET['pagina'];
                      $reg1 = ($pag-1) * $mostrar;

                      $sql = ("SELECT   * FROM asistencia_est 
                      	          INNER JOIN materia ON asistencia_est.id_materia = materia.id_materia
                                  INNER JOIN estudiantes ON estudiantes.id_estudiante = asistencia_est.id_estudiante
                                  INNER JOIN profesores ON profesores.id_profesor = asistencia_est.id_profesor 
                                  WHERE asistencia_est.id_profesor = '$id'
                                  AND asistencia_est.fecha_registro>='$fecha1' AND asistencia_est.fecha_registro<='$fecha2'");

                      $result = $mysqli->query($sql);
                      $consulta= $result->num_rows; 
                  ?>

                    <table class="table table-hover">
                      <thead>
                        <tr bgcolor="#05b911">
                          <th>Cedula</th>
                          <th>Estudiante</th>
                          <th>Materia</th>
                          <th>Sección</th>
                          <th>Fecha</th>
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
                          <td><?php echo $reg['fecha_registro'];?></td>
                          
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
				<a class="page-link" href="buscar_por_fecha.php?pagina=<?php echo $_GET['pagina']-1 ?>">< Anterior</a></li>  

			<?php for ($i=0;$i< $paginas;$i++): ?>

			 <li class="page-item 
			 <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?>">
				 <a class="page-link" href="buscar_por_fecha.php?pagina=<?php echo $i+1; ?>">
				 	<?php echo $i+1; ?>
				 </a>
			 </li>

		    <?php endfor ?>

			<li class="page-item
			<?php echo $_GET['pagina']>=$paginas? 'disabled':'' ?>"><a class="page-link" href="buscar_por_fecha.php?pagina=<?php echo $_GET['pagina']+1 ?>">Siguiente ></a></li>
		  </ul>


<!-- Button to Open the Modal -->





