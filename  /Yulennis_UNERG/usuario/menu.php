<?php 
include("../autenticado.php");
?>
<?php

error_reporting(0);


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Inicio | <?php echo $_SESSION["nombre"]; ?> </title>
  <link rel="stylesheet" href="../vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.addons.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="shortcut icon" href="../images/favicon.png" />
</head>

<body>
  
  <script type='text/javascript'>
  document.oncontextmenu = function(){return false}
</script>

  <div class="container-scroller">
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
          <img src="../images/favicon.png" width="100">
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="../images/faces/face3.jpg" alt="image" class="profile-pic">
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-info">
                    <i class="mdi mdi-email-outline mx-0"></i>
                  </div>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item dropdown d-none d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <span class="profile-text">Hola, <?php echo $_SESSION["nombre"]; ?><?php $_SESSION["usuario"]; ?><?php $_SESSION["id_profesor"]; ?>!</span>
              <i class="mdi mdi-account-circle"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <a class="dropdown-item mt-2" href="usuario_configurar.php">
                <i class="mdi mdi-account-circle"></i> Mi Perfil
              </a>
              <a class="dropdown-item" href="../salir.php">
                <i class="mdi mdi-power"></i><font color="red">Cerrar Sesión</font> 
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>

    <div class="container-fluid page-body-wrapper">
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                  <i class="mdi mdi-account-circle mdi-36px"></i>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"><?php echo $_SESSION["nombre"]; ?></p>
                  <div>
                    <small class="designation text-muted">Profesor</small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="home.php">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Inicio</span>
            </a>
          </li>
          <!-- Menu para Agregar Profesores, consulta y buscar-->
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#asistencia" aria-expanded="false" aria-controls="asistencia">
              <i class="mdi mdi-check-circle"></i>&nbsp;
              <span class="menu-title">Control de Asistencia</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="asistencia">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link"  href="buscar_estudiantes.php">Estudiantes</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link"  href="consulta_est_asis.php?pagina=1">Consulta</a>
                </li>
              </ul>
            </div>
          </li>
          <!-- Menu para Agregar Profesores, consulta y buscar
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#profesores" aria-expanded="false" aria-controls="profesores">
              <i class="mdi mdi-account-box-outline"></i>&nbsp;
              <span class="menu-title">Profesores</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="profesores">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="registrar_profesores.php">Registrar Nuevo</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="consulta_general_prof.php?pagina=1">Consultar Registrados</a>
                </li>
                <li class="divider"></li>
                <li class="nav-header"><span class="badge badge-primary">Materias - Horario</span></li>
                <li class="nav-item">
                  <a class="nav-link" href="asignar_materia_prof.php">Asignar Materia</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="consulta_materia_asig_prof.php?pagina=1">Consultar Asignadas</a>
                </li>
              </ul>
            </div>
          </li>-->
          <!-- Menu para Registrar Alumnos, consulta y buscar-->
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#estudiante" aria-expanded="false" aria-controls="estudiante">
              <i class="mdi mdi-account"></i>&nbsp;
              <span class="menu-title">Estudiantes</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="estudiante">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="consulta_general_est.php?pagina=1">Consultar</a>
                </li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#usuario" aria-expanded="false" aria-controls="usuario">
              <i class="mdi mdi-account-check"></i>&nbsp;
              <span class="menu-title">Usuario</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="usuario">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="usuario_configurar.php">Mi Perfil</a>
                  <a class="nav-link" href="../salir.php"><font color="red">Cerrar Sesión</font></a>
                </li>
              </ul>
            </div>
          </li>
          <!-- Menu para Registrar Alumnos, consulta y buscar
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#responsables" aria-expanded="false" aria-controls="responsables">
              <i class="mdi mdi-account-key"></i>&nbsp;
              <span class="menu-title">Responsables</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="responsables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="registrar_responsable.php">Registrar Nuevo</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="consulta_general_res.php?pagina=1">Consultar</a>
                </li>
                <li class="divider"></li>
                <li class="nav-header"><span class="badge badge-warning">Horario</span></li>
                <li class="nav-item">
                  <a class="nav-link" href="asignar_horario.php">Asignar Horario</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="consulta_horario_res.php?pagina=1">Consultar Horario</a>
                </li>
              </ul>
            </div>
          </li>-->
          <!--Menu para agregar materia, consultar y buscar
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#materia" aria-expanded="false" aria-controls="materia">
              <i class="mdi mdi-book-open-page-variant"></i>&nbsp;
              <span class="menu-title">Materias</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="materia">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="consulta_materia.php?pagina=1">Consultar y Agregar</a>
                </li>
              </ul>
            </div>
          </li>-->
          <!--Menu para Asignar las Materias a los profesores-->
          <!--<li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#asignar" aria-expanded="false" aria-controls="asignar">
              <i class="mdi mdi-book-open-page-variant"></i>&nbsp;
              <span class="menu-title">Asignar Materias Profesor</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="asignar">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="asignar_materia_prof.php">Asignar</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="consulta_materia_asig_prof.php?pagina=1">Consultar Asignadas</a>
                </li>
              </ul>
            </div>
          </li>-->
          <!--Menu para los Estudiantes registro, consulta y buscar
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#categoria" aria-expanded="false" aria-controls="categoria">
              <i class="mdi mdi-clipboard-text"></i>&nbsp;
              <span class="menu-title">Registrar Categorias</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="categoria">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="registar_categoria.php">Registrar Nuevo</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="consulta_categoria.php?pagina=1">Consultar</a>
                </li>
              </ul>
            </div>
          </li>-->
          <!--Menu para los Estudiantes registro, consulta y buscar
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#producto" aria-expanded="false" aria-controls="producto">
              <i class="mdi mdi-content-save"></i>&nbsp;
              <span class="menu-title">Inventario</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="producto">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="registrar_producto.php">Registro de Inventario</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="consulta_producto.php?pagina=1">Consultar</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="consulta_producto_detallada.php">Buscar</a>
                </li>
              </ul>
            </div>
          </li>
          -->
        </ul>
      </nav>
      <!-- CONTENIDO -->
      <div class="main-panel">
        <div class="content-wrapper">
          
         

  <script src="../vendors/js/vendor.bundle.base.js"></script>
  <script src="../vendors/js/vendor.bundle.addons.js"></script>
  <script src="../js/off-canvas.js"></script>
  <script src="../js/misc.js"></script>
  <script src="../js/dashboard.js"></script>




  <!-- Trigger the modal with a button -->


<!-- Modal -->
<div id="myModalp" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Control de Asistencia - Profesores</h4>
      </div>
      <div class="modal-body">

        	<form class="forms-sample" action="guardar/guardar_asistencia.php" method="GET">
                       <div class="form-group">
                          <label for="exampleInputEmail1">Eligue un Profesor</label>
                           <?php
                                include('../conexion.php');
                                $sql=("SELECT * FROM profesores ORDER BY  id_profesor DESC");
                                  $result = $mysqli->query($sql);
                                  $consulta= $result->num_rows; 
                           ?>

                              <select name="id_profesor" class="form-control" onchange="pedirDatos()" required >
                                 <option value=''>Seleccione un Profesor</option>
                              <?php while ($reg = $result->fetch_array()){
                                      $num++;
                                      
                                      echo "<option value=\"".$reg['id_profesor']."\">".$reg['nombre_prof']." ".$reg['apellido_prof']."</option> \n";
                                      
                                }
                            ?>
                             </select> 
                               
                        </div>
                        
                        <div class="form-group">
                          <label for="exampleInputPassword1">Hora de Entrada</label>

                          <input type="time" name="hora1" class="form-control" id="exampleInputPassword1" required>
                        </div>

                        <div class="form-group">
                          <label for="exampleInputPassword1">Hora de Salida</label>
                          <input type="time" name="hora2"  class="form-control" id="exampleInputPassword1" >
                        </div>
                        <button type="submit" class="btn btn-success mr-2">Guardar</button>
                      </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal -->
<div id="myModalr" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Control de Asistencia - Responsables</h4>
      </div>
      <div class="modal-body">
        <form class="forms-sample" action="guardar/guardar_asistencia_res.php" method="GET">
                       <div class="form-group">
                          <label for="exampleInputEmail1">Eligue un Responsable</label>
                           <?php
                                include('../conexion.php');
                                $sql=("SELECT * FROM responsables ORDER BY  nombre_res ASC");
                                  $result = $mysqli->query($sql);
                                  $consulta= $result->num_rows; 
                           ?>

                              <select name="id_responsable" class="form-control" onchange="pedirDatos()" required >
                                 <option value=''>Seleccione un Responsable</option>
                              <?php while ($reg = $result->fetch_array()){
                                      $num++;
                                      
                                      echo "<option value=\"".$reg['id_responsable']."\">".$reg['nombre_res']." ".$reg['apellido_res']."</option> \n";
                                      
                                }
                            ?>
                             </select> 
                               
                        </div>
                        
                        <div class="form-group">
                          <label for="exampleInputPassword1">Hora de Entrada</label>

                          <input type="time" name="hora1" class="form-control" id="exampleInputPassword1" required>
                        </div>

                        <div class="form-group">
                          <label for="exampleInputPassword1">Hora de Salida</label>
                          <input type="time" name="hora2"  class="form-control" id="exampleInputPassword1" >
                        </div>
                        <button type="submit" class="btn btn-success mr-2">Guardar</button>
                      </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>







</body>

</html>