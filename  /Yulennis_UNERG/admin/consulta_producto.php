<?php 
  include('menu.php');
  include('../conexion.php');
?>

<?php 

$sql = 'SELECT * FROM productos';
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

                  <!--Mensajes-->
                   <?php include('../alert.php'); ?>
                  <!--Fin de Mensajes-->

                  <a href="consulta_producto_detallada.php">
                    <button type="button" class="btn btn-inverse-primary">Consulta detallada</button>
                  </a>

                  <h4 align="center">Lista General de Inventario </h4>

                  <div style="float:right">
                    <a id="add_row" class="btn btn-inverse-primary" href="pdf/pdf.php" target="nuevo">Generar <i class="mdi mdi-file-pdf-box"></i>
                      <span class="glyphicon glyphicon-plus"></span>
                    </a> 
                  </div><br>

                  <hr><div class="table-responsive">

                  <?php 
                      $pag = $_GET['pagina'];
                      $reg1 = ($pag-1) * $mostrar;

                      $sql = ("SELECT  * FROM productos 
                      	          INNER JOIN categorias ON productos.id_categoria = categorias.id_categoria
                      	          Order by productos.id_producto 
								  DESC LIMIT $reg1, $mostrar");

                      $result = $mysqli->query($sql);
                      $consulta= $result->num_rows; 
                  ?>


                    <table class="table table-hover">
                      <thead>
                        <tr bgcolor="#2E9AFE">
                          <th><b>Artículos</b></th>
                          <th><b>Ubicación</b></th>
                          <th><b>Sede</b></th>
                          <th colspan="2">Acciones</th>
                        </tr>
                      </thead>
                      <?php while ($reg = $result->fetch_array()){
                                      $num++;
                       ?>
                      <tbody>
                        <tr>
                          <td>
                        <b>Codigo:</b> <?php echo $reg['codigo_producto'];?><br>
                        <b>Articulo:</b> <?php echo $reg['nombre_equipo'];?><br>
                        <b>Cantidad:</b> <?php echo $reg['cantidad'];?><br>
                        <b>Marca:</b> <?php echo $reg['marca'];?><br>
                        <b>Categoria:</b> <?php echo $reg['categoria'];?>
                          </td>
                          <td>
                            <?php echo $reg['ubicacion'];?>
                          </td>
                          <td>
                            <?php echo $reg['sede'];?>
                          </td>
                          
                          <td>
                          	<a href="editar_producto.php?id_producto=<?php echo $reg['id_producto']?>">
                          <button title="Editar" class="btn btn-inverse-primary btn-sm">
                            <i class="mdi mdi-table-edit"></i> </button></a>


                          	<a href="eliminar/eliminar_producto.php?id_producto=<?php echo $reg['id_producto']?>" onclick=" return ConfirmDelete()">
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
				<a class="page-link" href="consulta_producto.php?pagina=<?php echo $_GET['pagina']-1 ?>">< Anterior</a></li>  

			<?php for ($i=0;$i< $paginas;$i++): ?>

			 <li class="page-item 
			 <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?>">
				 <a class="page-link" href="consulta_producto.php?pagina=<?php echo $i+1; ?>">
				 	<?php echo $i+1; ?>
				 </a>
			 </li>

		    <?php endfor ?>

			<li class="page-item
			<?php echo $_GET['pagina']>=$paginas? 'disabled':'' ?>"><a class="page-link" href="consulta_producto.php?pagina=<?php echo $_GET['pagina']+1 ?>">Siguiente ></a></li>
		  </ul>


<br>
<?php include('../footer.php'); ?>
