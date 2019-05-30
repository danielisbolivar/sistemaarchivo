<?php 
  include('menu.php');
  include('../conexion.php');
?>

<?php 

$sql = "SELECT * FROM prof_materias WHERE id_responsable >'0'";
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
                  <h3 align="center">Consulta de Horarios de los Responsables del Laboratorio </h3><hr>
                   <?php include('../alert.php'); ?>
                  <div class="table-responsive">

                  <?php 
                      $pag = $_GET['pagina'];
                      $reg1 = ($pag-1) * $mostrar;

                      $sql = ("SELECT  * FROM prof_materias
                      	          INNER JOIN responsables ON responsables.id_responsable = prof_materias.id_responsable
                      	          Order by prof_materias.id_prof_materia 
								  DESC LIMIT $reg1, $mostrar");

                      $result = $mysqli->query($sql);
                      $consulta= $result->num_rows; 
                  ?>

                    <table class="table table-hover">
                      <thead>
                        <tr bgcolor="#e1ca26">
                          <th>Responsable</th>
                          <th>Dia / Horario</th>
                          <th colspan="2">Acciones</th>
                        </tr>
                      </thead>
                      <?php while ($reg = $result->fetch_array()){
                                      $num++;
                       ?>
                      <tbody>
                        <tr>
                          <td>
                            <?php echo $reg['nombre_res'];?>
                          	<?php echo $reg['apellido_res'];?>
                          </td>
                          <td>
                          	Dia: <?php echo $reg['dia'];?>&nbsp;<?php echo '</br>'; ?>
                          	Desde: <?php echo $reg['hora1'];?>&nbsp;
                          	Hasta: <?php echo $reg['hora2'];?>&nbsp;<?php echo'</br>'; ?>
                          	Aula: <?php echo $reg['aula_lab'];?>&nbsp;
                          	
                          </td>
                          
                          <td>
                          	<a href="editar_horario_res.php?id_prof_materia=<?php echo $reg['id_prof_materia']?>">
                          <button title="Editar" class="btn btn-inverse-primary btn-sm">
                            <i class="mdi mdi-table-edit"></i> </button></a>


                          	<a href="eliminar/eliminar_horario.php?id_prof_materia=<?php echo $reg['id_prof_materia']?>" onclick=" return ConfirmDelete()">
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
				<a class="page-link" href="consulta_horario_res.php?pagina=<?php echo $_GET['pagina']-1 ?>">< Anterior</a></li>  

			<?php for ($i=0;$i< $paginas;$i++): ?>

			 <li class="page-item 
			 <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?>">
				 <a class="page-link" href="consulta_horario_res.php?pagina=<?php echo $i+1; ?>">
				 	<?php echo $i+1; ?>
				 </a>
			 </li>

		    <?php endfor ?>

			<li class="page-item
			<?php echo $_GET['pagina']>=$paginas? 'disabled':'' ?>"><a class="page-link" href="consulta_horario_res.php?pagina=<?php echo $_GET['pagina']+1 ?>">Siguiente ></a></li>
		  </ul>



