<?php 
  include('menu.php');
  include('../conexion.php');
?>

<?php 

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
                  <h3 align="center">Consulta de Materias Asignadas a Estudiantes </h3><hr>
                   <?php include('../alert.php'); ?>
                  <div class="table-responsive">

                  <?php 
                      $pag = $_GET['pagina'];
                      $reg1 = ($pag-1) * $mostrar;

                      $sql = ("SELECT  * FROM asig_estudiantes 
                      	          INNER JOIN materia ON asig_estudiantes.id_materia = materia.id_materia
                                  INNER JOIN estudiantes ON estudiantes.id_estudiante = asig_estudiantes.id_estudiante
                      	          INNER JOIN profesores ON profesores.id_profesor = asig_estudiantes.id_profesor
                      	          Order by asig_estudiantes.id_asig_est 
								  DESC LIMIT $reg1, $mostrar");

                      $result = $mysqli->query($sql);
                      $consulta= $result->num_rows; 
                  ?>

                    <table class="table table-hover">
                      <thead>
                        <tr bgcolor="#05b911">
                          <th>Estudiante</th>
                          <th>Profesor</th>
                          <th>Detalles</th>
                          <th colspan="2">Acciones</th>
                        </tr>
                      </thead>
                      <?php while ($reg = $result->fetch_array()){
                                      $num++;
                       ?>
                      <tbody>
                        <tr>
                          <td>
                            <?php echo $reg['nombre_est'];?>
                            <?php echo $reg['apellido_est'];?>
                          </td>

                          <td>
                            <?php echo $reg['nombre_prof'];?>
                          	<?php echo $reg['apellido_prof'];?>
                          </td>
                          <td><?php echo $reg['materia'];?><?php echo '</br>'; ?>
                          	
                          	
                          	Sec: <?php echo $reg['seccion'];?>
                          </td>
                          
                          <td>
                          	<a href="editar_materia_asig_est.php?id_asig_est=<?php echo $reg['id_asig_est']?>">
                          <button title="Editar" class="btn btn-inverse-primary btn-sm">
                            <i class="mdi mdi-table-edit"></i> </button></a>


                          	<a href="eliminar/eliminar_materia_asig_est.php?id_asig_est=<?php echo $reg['id_asig_est']?>" onclick=" return ConfirmDelete()">
                            <button  class="btn btn-inverse-dark  btn-sm" title='Borrar'>
                              <i class="mdi mdi-account-remove"></i></button></a>


                          </td>
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
				<a class="page-link" href="consulta_materia_asig_est.php?pagina=<?php echo $_GET['pagina']-1 ?>">< Anterior</a></li>  

			<?php for ($i=0;$i< $paginas;$i++): ?>

			 <li class="page-item 
			 <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?>">
				 <a class="page-link" href="consulta_materia_asig_est.php?pagina=<?php echo $i+1; ?>">
				 	<?php echo $i+1; ?>
				 </a>
			 </li>

		    <?php endfor ?>

			<li class="page-item
			<?php echo $_GET['pagina']>=$paginas? 'disabled':'' ?>"><a class="page-link" href="consulta_materia_asig_est.php?pagina=<?php echo $_GET['pagina']+1 ?>">Siguiente ></a></li>
		  </ul>


<?php   /*  SELECT lugar,actividad,fecha,hinicio,hfinal FROM eventos WHERE 
str_to_date('10/06/2009','%d/%m/%Y')
    and lugar='Salon Comunal' and
    (
    DATE_ADD(CAST(CONCAT(STR_TO_DATE('10/06/2009','%d/%m/%Y'),' ','05:14:00') AS DATETIME),INTERVAL 1 MINUTE) <= CAST(CONCAT(fecha,' ',hfinal) AS DATETIME) 
    AND 
    DATE_SUB(CAST(CONCAT(STR_TO_DATE('10/06/2009','%d/%m/%Y'),' ','06:01:00') AS DATETIME),INTERVAL 1 MINUTE) >= CAST(CONCAT(fecha,' ',hinicio) AS DATETIME)
    ); */?>
