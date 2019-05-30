<?php 
include('menu.php');
include('../conexion.php'); 
?>
<script type="text/javascript">
  function ConfirmDelete()
  {
    var respuesta = confirm("Estas seguro que deseas Desactivar a este Usuario?");
  if (respuesta == true) 
  {
    return true;

  }else{

    return false;
  }
}


</script>
<script type="text/javascript">
  function ConfirmActivar()
  {
    var respuesta = confirm("Estas seguro que deseas Activar a este Usuario?");
  if (respuesta == true) 
  {
    return true;

  }else{

    return false;
  }
}


</script>

<h3 align="center">Lista de Usuarios Profesores</h3><hr>
<!-- Nav tabs -->
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#home">Todos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#menu1">Activos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#menu2">Deshabilitados</a>
  </li>
</ul>
<br>
<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane container active" id="home">
            <table class="table table-hover">
                 <?php include('../alert.php'); ?>

                  <?php 
                      

                      $sql = ("SELECT   * FROM usuarios_admin
                  Order by id_profesor 
                  DESC");

                      $result = $mysqli->query($sql);
                      $consulta= $result->num_rows; 
                  ?>


                      <thead>
                        <tr bgcolor="#2E9AFE">
                          <th>Nombre</th>
                          <th>Usuario ó Email</th>
                          <th colspan="2">Acciones</th>
                        </tr>
                      </thead>
                      <?php while ($reg = $result->fetch_array()){
                                      $num++;
                       ?>
                      <tbody>
                        <tr>
                          <td><?php echo $reg['nombre'];?></td>
                          <td><?php echo $reg['usuario'];?></td>
                          <td>
                            <a href="editar_usuario.php?id_usuario=<?php echo $reg['id_usuario']?>">
                          <button title="Editar" class="btn btn-inverse-primary btn-sm">
                            <i class="mdi mdi-table-edit"></i> </button></a>

                             <a href="eliminar/activar_usuarios.php?id_usuario=<?php echo $reg['id_usuario']?>" onclick=" return ConfirmActivar()">
                            <button  class="btn btn-inverse-success  btn-sm" title='Activar'>
                              <i class="mdi mdi-account-check"></i></button></a>

                            <a href="eliminar/eliminar_usuarios.php?id_usuario=<?php echo $reg['id_usuario']?>" onclick=" return ConfirmDelete()">
                            <button  class="btn btn-inverse-danger  btn-sm" title='Desactivar'>
                              <i class="mdi mdi-account-remove"></i></button></a>


                          </td>
                        </tr>
                      </tbody>
                       <?php 
                              }
                       ?>
                    </table>
  </div>
  <div class="tab-pane container fade" id="menu1">
    <table class="table table-hover">

                  <?php 
                      

                      $sql = ("SELECT * FROM usuarios_admin WHERE tipo = 'normal' Order by id_profesor DESC");

                      $result = $mysqli->query($sql);
                      $consulta= $result->num_rows; 
                  ?>


                      <thead>
                        <tr bgcolor="#2E9AFE">
                          <th>Nombre</th>
                          <th>Usuario ó Email</th>
                          <th colspan="2">Acciones</th>
                        </tr>
                      </thead>
                      <?php while ($reg = $result->fetch_array()){
                                      $num++;
                       ?>
                      <tbody>
                        <tr>
                          <td><?php echo $reg['nombre'];?></td>
                          <td><?php echo $reg['usuario'];?></td>
                          <td>
                            <a href="editar_usuario.php?id_usuario=<?php echo $reg['id_usuario']?>">
                          <button title="Editar" class="btn btn-inverse-primary btn-sm">
                            <i class="mdi mdi-table-edit"></i> </button></a>

                             <a href="eliminar/activar_usuarios.php?id_usuario=<?php echo $reg['id_usuario']?>" onclick=" return ConfirmActivar()">
                            <button  class="btn btn-inverse-success  btn-sm" title='Activar'>
                              <i class="mdi mdi-account-check"></i></button></a>

                            <a href="eliminar/eliminar_usuarios.php?id_usuario=<?php echo $reg['id_usuario']?>" onclick=" return ConfirmDelete()">
                            <button  class="btn btn-inverse-danger  btn-sm" title='Desactivar'>
                              <i class="mdi mdi-account-remove"></i></button></a>


                          </td>
                        </tr>
                      </tbody>
                       <?php 
                              }
                       ?>
                    </table>
  </div>
  <div class="tab-pane container fade" id="menu2">
    <table class="table table-hover">

                  <?php 
                      

                      $sql = ("SELECT  * FROM usuarios_admin WHERE tipo = 'desabilitado'
                  Order by id_profesor 
                  DESC");

                      $result = $mysqli->query($sql);
                      $consulta= $result->num_rows; 
                  ?>


                      <thead>
                        <tr bgcolor="#2E9AFE">
                          <th>Nombre</th>
                          <th>Usuario ó Email</th>
                          <th colspan="2">Acciones</th>
                        </tr>
                      </thead>
                      <?php while ($reg = $result->fetch_array()){
                                      $num++;
                       ?>
                      <tbody>
                        <tr>
                          <td><?php echo $reg['nombre'];?></td>
                          <td><?php echo $reg['usuario'];?></td>
                          <td>
                            <a href="editar_usuario.php?id_usuario=<?php echo $reg['id_usuario']?>">
                          <button title="Editar" class="btn btn-inverse-primary btn-sm">
                            <i class="mdi mdi-table-edit"></i> </button></a>

                             <a href="eliminar/activar_usuarios.php?id_usuario=<?php echo $reg['id_usuario']?>" onclick=" return ConfirmActivar()">
                            <button  class="btn btn-inverse-success  btn-sm" title='Activar'>
                              <i class="mdi mdi-account-check"></i></button></a>

                            <a href="eliminar/eliminar_usuarios.php?id_usuario=<?php echo $reg['id_usuario']?>" onclick=" return ConfirmDelete()">
                            <button  class="btn btn-inverse-danger  btn-sm" title='Desactivar'>
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



<br>
<?php include('../footer.php'); ?>

