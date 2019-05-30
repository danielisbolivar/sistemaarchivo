<?php 
include('menu.php');
include('../conexion.php'); 
?>

<?php 

$sql = 'SELECT * FROM estudiantes';
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
                  <h3 align="center">Lista General de Estudiantes </h3><hr>
                  <div style="float:right">
                    <a id="add_row" class="btn btn-inverse-primary" href="pdf/pdf6.php" target="nuevo">Generar <i class="mdi mdi-file-pdf-box"></i>
                      <span class="glyphicon glyphicon-plus"></span>
                    </a> 
                  </div>
                  <div style="float:left;">
                    <form action="consulta_general_est_busca.php" method="GET">
                      <select class="form-control" name="buscar">
                       <option value="San Juan de los Morros">San Juan de los Morros</option>
                       <option value="Ortiz">Ortiz</option>
                       <option value="Mellado">Mellado</option>
                      </select> <br>
                      <button type="submit" class="btn btn-primary">Buscar</button>
                    </form>
                  </div>


                   <?php include('../alert.php'); ?>
                  <div class="table-responsive">

                  <?php 
                      $pag = $_GET['pagina'];
                      $reg1 = ($pag-1) * $mostrar;

                      $sql = ("SELECT   * FROM estudiantes 
                      	          INNER JOIN telefono ON estudiantes.id_estudiante = telefono.id_estudiante
								  INNER JOIN email  ON estudiantes.id_estudiante = 
								       email.id_estudiante
								  INNER JOIN direccion  ON estudiantes.id_estudiante = 
								  direccion.id_estudiante 
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
                          <th>Telefono</th>
                          <th colspan="2">Acciones</th>
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
                          <td><?php echo $reg['telefono'];?></td>
                          <td>
                          	<a href="editar_est.php?id_estudiante=<?php echo $reg['id_estudiante']?>">
                          <button title="Editar" class="btn btn-inverse-primary btn-sm">
                            <i class="mdi mdi-table-edit"></i> </button></a>


                          	<a href="eliminar/eliminar_est.php?id_estudiante=<?php echo $reg['id_estudiante']?>" onclick=" return ConfirmDelete()">
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



      <br>
      <?php include('../footer.php'); ?>






