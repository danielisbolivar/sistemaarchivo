<?php 
include('menu.php');
include('../conexion.php'); 
?>

<?php 

$sql = 'SELECT * FROM categorias';
$result = $mysqli->query($sql);
$num=$result->num_rows;


          while ($fila = $result->fetch_assoc()) {
           

           $mostrar = '10';
           $dividir = ($num / $mostrar);
           $paginas = ceil($dividir);
           //echo $paginas;
}
 
?>
<style type="text/css">

.estado-disponible-usuario {
  color:#2FC332;
}
.estado-no-disponible-usuario {
  color:#D60202;
}
.estado-disponible-correo {
  color:#2FC332;
}
.estado-no-disponible-correo {
  color:#D60202;
}
</style>
<script>
function comprobarUsuario() {
  $("#loaderIcon").show();
  jQuery.ajax({
  url: "ComprobarDisponibilidad.php",
  data:'codigo='+$("#codigo").val(),
  type: "POST",
  success:function(data){
    $("#estadousuario").html(data);
    $("#loaderIcon").hide();
  },
  error:function (){}
  });
}

</script>

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




<div class="col-lg-10 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                 <h3 align="center">Lista de Categorias </h3><hr>

                   <?php include('../alert.php'); ?>
                  <div class="table-responsive">

                  <?php 
                      $pag = $_GET['pagina'];
                      $reg1 = ($pag-1) * $mostrar;

                      $sql = ("SELECT   * FROM categorias  Order by id_categoria DESC LIMIT $reg1, $mostrar");

                      $result = $mysqli->query($sql);
                      $consulta= $result->num_rows; 
                  ?>

                    <table class="table table-hover">
                      <thead>
                        <tr bgcolor="#2E9AFE">
                          <th>Categoria</th>
                          <th colspan="2">Acciones</th>
                        </tr>
                      </thead>
                      <?php while ($reg = $result->fetch_array()){
                                      $num++;
                       ?>
                      <tbody>
                        <tr>
                          <td><?php echo $reg['categoria'];?></td>
                          <td>
                            <a href="editar_categoria.php?id_categoria=<?php echo $reg['id_categoria']?>">
                          <button title="Editar" class="btn btn-inverse-primary btn-sm">
                            <i class="mdi mdi-table-edit"></i> </button></a>


                            <a href="eliminar/eliminar_categoria.php?id_categoria=<?php echo $reg['id_categoria']?>" onclick=" return ConfirmDelete()">
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
        <a class="page-link" href="consulta_categoria.php?pagina=<?php echo $_GET['pagina']-1 ?>">< Anterior</a></li>  

      <?php for ($i=0;$i< $paginas;$i++): ?>

       <li class="page-item 
       <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?>">
         <a class="page-link" href="consulta_categoria.php?pagina=<?php echo $i+1; ?>">
          <?php echo $i+1; ?>
         </a>
       </li>

        <?php endfor ?>

      <li class="page-item
      <?php echo $_GET['pagina']>=$paginas? 'disabled':'' ?>"><a class="page-link" href="consulta_categoria.php?pagina=<?php echo $_GET['pagina']+1 ?>">Siguiente ></a></li>
      </ul>



<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Agregar Nueva Materia</h4>
      </div>
      <div class="modal-body">
              <div class="card">
                <div class="card-body">
                  <?php include('alert.php'); ?>
                  <form class="forms-sample" id="combo" name="combo" action="guardar/guardar_materia.php" method="POST">
                    <div class="form-group">
                      <label for="exampleInputName1">Codigo</label>
                      <input type="text" name="codigo" onBlur="comprobarUsuario()" class="form-control" id="codigo" placeholder="Nombre de la Carrera" required="">
                      <span id="estadousuario"></span>
                    </div>
                    <p>
                     <img src="LoaderIcon.gif" id="loaderIcon" style="display:none" />
                    </p>
                    <div class="form-group">
                      <label for="exampleInputName1">Nombre de la Materia</label>
                      <input type="text" name="materia" class="form-control" id="exampleInputName1" placeholder="Nombre de la Carrera" required="">
                    </div>
                    <button type="submit" class="btn btn-success mr-2">Guardar</button>
                    <button type="reset" class="btn btn-light">Cancelar</button>
                  </form>
                </div>
              </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>

<?php include('../footer.php'); ?>


