<?php include('menu.php'); ?>

<?php include('../alert.php'); ?>
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#home">Información</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#menu1">Editar</a>
  </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane container active" id="home">
    <div class="card" style="width:250px">
      <img class="card-img-top" src="../images/usuario.png" alt="Card image">
      <div class="card-body">
        <h4 class="card-title"><?php echo $_SESSION["nombre"]; ?></h4>
        <p class="card-text"><?php echo $_SESSION["usuario"]; ?></p>
      </div>
    </div>
  </div>
  <div class="tab-pane container fade" id="menu1">
     <div class="card" style="width:250px">
      <img class="card-img-top" src="../images/usuario.png" alt="Card image">
      <?php 
                    $usuario = $_SESSION["usuario"];
                    $sql = ("SELECT * FROM usuarios_admin WHERE usuario ='$usuario'");
                     $result = $mysqli->query($sql);
                     $consulta= $result->num_rows;
                     while ($reg = $result->fetch_array()){
                                      $num++;

                      $id = $reg['id_usuario'];
                      echo $id_usuario;          

                     
                  ?>
      <div class="card-body">
        <form class="form-control" action="editar/editar_usuario.php" method="GET">
          <p>Nombre</p>
          <input type="hidden" name="id_usuario" value="<?php echo $reg["id_usuario"]; ?>">
          <input type="text" class="form-control" name="nombre" value="<?php echo $reg["nombre"]; ?>"><hr>
          <p>Usuario o Email</p>
          <input type="text" class="form-control" name="usuario" value="<?php echo $reg["usuario"]; ?>"><hr>
          <p>Contraseña</p>
          <input type="password" class="form-control" name="password" value="<?php echo $reg["pwd"]; ?>"><br>
          <p><button type="submit" class="btn btn-primary">Actualizar</button></p>
        </form>
      </div>
       
      <?php 
        }
      ?>
    </div>
  </div>
</div>

<br>
<?php include('../footer.php'); ?>