<?php 
include('menu.php');
include('../conexion.php'); 
?>


<?php 
$fecha1 = $_GET['fecha1'];
$fecha2 = $_GET['fecha2'];
$profesor = $_GET['profesor'];
$materia = $_GET['materia'];
$seccion = $_GET['seccion'];



$sql = "SELECT   * FROM asistencia_est 
                                  INNER JOIN materia ON asistencia_est.id_materia = materia.id_materia
                                  INNER JOIN estudiantes ON estudiantes.id_estudiante = asistencia_est.id_estudiante
                                  INNER JOIN profesores ON profesores.id_profesor = asistencia_est.id_profesor 
                                  WHERE asistencia_est.id_profesor = '$profesor' 
                                   AND asistencia_est.id_materia = '$materia' 
                                   AND asistencia_est.seccion = '$seccion' 
                                   AND asistencia_est.fecha_registro >= '$fecha1' 
                                   AND asistencia_est.fecha_registro <= '$fecha2'";
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
                  <br>

                  <?php include('../alert.php'); ?>

                  <h4 align="center">Lista de Asistencia de los Estudiantes por Profesor y Materia </h4><hr><br>
                  <div style="float:right">
                    <a id="add_row" class="btn btn-inverse-primary" href="pdf/pdf10.php?fecha1=<?php echo $fecha1; ?>&fecha2=<?php echo $fecha2; ?>&profesor=<?php echo $profesor; ?>&materia=<?php echo $materia; ?>&seccion=<?php echo $seccion; ?>" target="nuevo">Generar <i class="mdi mdi-file-pdf-box"></i>
                      <span class="glyphicon glyphicon-plus"></span>
                    </a> 
                  </div>
                   
                  <div class="table-responsive">

                  <?php 
                      $pag = $_GET['pagina'];
                      $reg1 = ($pag-1) * $mostrar;

                      $sql = ("SELECT   * FROM asistencia_est 
                      	          INNER JOIN materia ON asistencia_est.id_materia = materia.id_materia
                                  INNER JOIN estudiantes ON estudiantes.id_estudiante = asistencia_est.id_estudiante
                                  INNER JOIN profesores ON profesores.id_profesor = asistencia_est.id_profesor 
                                  WHERE asistencia_est.id_profesor = '$profesor' 
                                   AND asistencia_est.id_materia = '$materia' 
                                   AND asistencia_est.seccion = '$seccion' 
                                   AND asistencia_est.fecha_registro >= '$fecha1' 
                                   AND asistencia_est.fecha_registro <= '$fecha2'");

                      $result = $mysqli->query($sql);
                      $consulta= $result->num_rows; 
                  ?>

                    <table class="table table-hover">
                      <thead>
                        <tr bgcolor="#05b911">
                          <th>Cedula</th>
                          <th>Estudiante</th>
                          <th>Profesor</th>
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
                          <td><?php echo $reg['nombre_est'];?>
                          &nbsp;<?php echo $reg['apellido_est'];?></td>
                          <td><?php echo $reg['nombre_prof'];?>
                          &nbsp;<?php echo $reg['apellido_prof'];?></td>
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
				<a class="page-link" href="consulta_de_asistencia.php?pagina=<?php echo $_GET['pagina']-1 ?>">< Anterior</a></li>  

			<?php for ($i=0;$i< $paginas;$i++): ?>

			 <li class="page-item 
			 <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?>">
				 <a class="page-link" href="consulta_de_asistencia.php?pagina=<?php echo $i+1; ?>">
				 	<?php echo $i+1; ?>
				 </a>
			 </li>

		    <?php endfor ?>

			<li class="page-item
			<?php echo $_GET['pagina']>=$paginas? 'disabled':'' ?>"><a class="page-link" href="consulta_de_asistencia.php?pagina=<?php echo $_GET['pagina']+1 ?>">Siguiente ></a></li>
		  </ul>


<!-- Button to Open the Modal -->

<?php include('../footer.php'); ?>



