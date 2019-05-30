<?php 
include('menu.php');
include('../conexion.php'); 
?>

<?php 

$sql = 'SELECT * FROM profesores';
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
                <div class="row">
                  <div class="col-sm-4">
                    <form class="form-control" action="buscar_profesor.php" method="GET">
                      <select class="form-control" name="buscar" required>
                              <option value="">Seleccione una Sede</option>
                              <option value="SAN JUAN DE LOS MORROS">San Juan de los Morros</option>
                              <option value="ORTIZ">Ortiz</option>
                              <option value="MELLADO">Mellado</option>
                              <option value="CALABOZO">Calabozo</option>
                      </select>
                    </div>
                   <div class="col-sm-2"><p><p>
                    <button type="submit" class="btn btn-inverse-primary">Buscar</button>
                     </form> 
                   </div>
                  </div><br>

                <div class="card-body">
                  <h3 align="center">Consulta General - Profesores </h3><hr>
                  <div style="float:right">
                    <a id="add_row" class="btn btn-inverse-primary" href="pdf/pdf4.php" target="nuevo">Generar <i class="mdi mdi-file-pdf-box"></i>
                      <span class="glyphicon glyphicon-plus"></span>
                    </a> 
                  </div><br><br>

                   <?php include('../alert.php'); ?>
                  <div class="table-responsive">

                  <?php 
                      $pag = $_GET['pagina'];
                      $reg1 = ($pag-1) * $mostrar;

                      $sql = ("SELECT   * FROM profesores 
                      	          INNER JOIN telefono ON profesores.id_profesor = telefono.id_profesor
								  INNER JOIN email  ON profesores.id_profesor = 
								       email.id_profesor
								  INNER JOIN direccion  ON profesores.id_profesor = 
								  direccion.id_profesor 
								  Order by profesores.id_profesor 
								  DESC LIMIT $reg1, $mostrar");

                      $result = $mysqli->query($sql);
                      $consulta= $result->num_rows; 
                  ?>

                    <table class="table table-hover">
                      <thead>
                        <tr bgcolor="#2E9AFE">
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
                          <td><?php echo $reg['cedula_prof'];?></td>
                          <td>

                          	<?php echo $reg['nombre_prof'];?>
                          &nbsp;<?php echo $reg['apellido_prof'];?>
                            
                          </td>
                          <td><?php echo $reg['telefono'];?></td>
                          <td><div class="btn-group-vertical">
                                <div class="btn-group">
                                  <button type="button" class="btn btn-primary  btn-sm dropdown-toggle" data-toggle="dropdown">
                                     <i class="mdi mdi-account-settings-variant"></i>
                                  </button>
                                  <div class="dropdown-menu">
                                    <a class="dropdown-item" href="editar_prof.php?id_profesor=<?php echo $reg['id_profesor']?>">Editar</a>

                                    <a class="dropdown-item" href="eliminar/eliminar_prof.php?id_profesor=<?php echo $reg['id_profesor']?>" onclick=" return ConfirmDelete()"><font color="red">Borrar</font></a>
                                  </div>
                                </div>
                              </div> 

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
				<a class="page-link" href="consulta_general_prof.php?pagina=<?php echo $_GET['pagina']-1 ?>">< Anterior</a></li>  

			<?php for ($i=0;$i< $paginas;$i++): ?>

			 <li class="page-item 
			 <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?>">
				 <a class="page-link" href="consulta_general_prof.php?pagina=<?php echo $i+1; ?>">
				 	<?php echo $i+1; ?>
				 </a>
			 </li>

		    <?php endfor ?>

			<li class="page-item
			<?php echo $_GET['pagina']>=$paginas? 'disabled':'' ?>"><a class="page-link" href="consulta_general_prof.php?pagina=<?php echo $_GET['pagina']+1 ?>">Siguiente ></a></li>
		  </ul>


<br>
<?php include('../footer.php'); ?>



