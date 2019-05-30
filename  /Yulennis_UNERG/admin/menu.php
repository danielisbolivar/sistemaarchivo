<?php 
include("../autenticado.php");
?>
<?php

error_reporting(0);


?>
<script type='text/javascript'>
  document.oncontextmenu = function(){return false}
</script>
<script>
function comprobarUsuario() {
  $("#loaderIcon").show();
  jQuery.ajax({
  url: "admin/ComprobarDisponibilidad.php",
  data:'cedula_est='+$("#cedula_est").val(),
  type: "POST",
  success:function(data){
    $("#estadousuario").html(data);
    $("#loaderIcon").hide();
  },
  error:function (){}
  });
}
function comprobarEmail() {
  $("#loaderIconEmail").show();
  jQuery.ajax({
  url: "admin/ComprobarDisponibilidad.php",
  data:'email='+$("#email").val(),
  type: "POST",
  success:function(data){
    $("#estadoemail").html(data);
    $("#loaderIconEmail").hide();
  },
  error:function (){}
  });
}
</script>
<script>
    function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
</script>
<script>
    function soloNumeros(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " 1234567890";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
</script>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Administrador | <?php echo $_SESSION["nombre"]; ?> </title>
  <link rel="stylesheet" href="../vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.addons.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="shortcut icon" href="../images/favicon.png" />
</head>

<body>
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
              <span class="profile-text">Hola, <?php echo $_SESSION["nombre"]; ?>!</span>
              <i class="mdi mdi-account-circle"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <a class="dropdown-item mt-2" href="usuario_configurar.php">
                <i class="mdi mdi-account-circle"></i> Mi Perfil
              </a>
              <a class="dropdown-item mt-2" href="usuarios.php">
                <i class="mdi mdi-account-settings-variant"></i> Configurar Usuarios
              </a>
              <a class="dropdown-item mt-2" href="backup.php">
                <i class="mdi mdi-cloud-download"></i> Respaldar BD
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
                    <small class="designation text-muted">Administrador</small>
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
                  <a class="nav-link" data-toggle="modal" href="#myModalp">Profesores</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="modal" href="#myModalr">Responsables</a>
                </li>
                <li class="divider"></li>
                <li class="nav-header"><span class="badge badge-primary">Consultas</span></li>
                <li class="nav-item">
                  <a class="nav-link" href="consulta_asistencia_hoy.php?pagina=1">Asistencia Profesores</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="consulta_asistencia_hoy_res.php?pagina=1">Asistencia Responsables</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="buscar_asistencia_estudiante.php">Asistencia Estudiantes</a>
                </li>
              </ul>
            </div>
          </li>
          <!-- Menu para Agregar Profesores, consulta y buscar-->
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
          </li>
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
                  <a class="nav-link" href="registrar_estudiante.php">Registrar Nuevo</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="consulta_general_est.php?pagina=1">Lista de Estudiantes</a>
                </li>
                 <li class="divider"></li>
                <li class="nav-header"><span class="badge badge-success">Materias</span></li>
                <li class="nav-item">
                  <a class="nav-link" href="asignar_materia_est.php">Asignar Materia Estudiante</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="consulta_materia_asig_est.php?pagina=1">Consultar Asignadas</a>
                </li>
              </ul>
            </div>
          </li>
          <!-- Menu para Registrar Alumnos, consulta y buscar-->
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
          </li>
          <!--Menu para agregar materia, consultar y buscar-->
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
          </li>
         
          <!--Menu para los Estudiantes registro, consulta y buscar-->
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
          </li>
          <!--Menu para los Estudiantes registro, consulta y buscar-->
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
          <!-- Observaciones -->
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#observaciones" aria-expanded="false" aria-controls="observaciones">
              <i class="mdi mdi-contacts"></i>&nbsp;
              <span class="menu-title">Observaciones</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="observaciones">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link"  data-toggle="modal" href="#myModalObservaciones">Registro Profesores</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="consulta_observaciones.php?pagina=1">Consultar Profesores</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link"  data-toggle="modal" href="#myModalObservacionesRes">Registro Responsables</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="consulta_observaciones1.php?pagina=1">Consultar Responsables</a>
                </li>
                
              </ul>
            </div>
          </li>
          <!--USUARIOS-->
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#usuarios" aria-expanded="false" aria-controls="usuarios">
              <i class="mdi mdi-account-circle"></i>&nbsp;
              <span class="menu-title">Usuario</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="usuarios">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link"  href="usuario_configurar.php">Mi Perfin</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="usuarios.php">Configurar Usuarios</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="backup.php">Respaldar BD</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../salir.php"><font color="red">Cerrar Sesión</font></a>
                </li>
                
              </ul>
            </div>
          </li>
          <br><br>
        </ul>
      </nav>
      <!-- CONTENIDO -->
      <div class="main-panel">
        <div class="content-wrapper">

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
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
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
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>


<!-- The Modal -->




<!-- The Modal -->
<div class="modal" id="myModalObservaciones">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Registro de Observaciones Profesores </h4> 
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="guardar/guardar_observaciones.php" method="GET">
          <label>Profesor</label>
          <?php
                                $sql=("SELECT * FROM profesores ORDER BY  id_profesor DESC");
                                  $result = $mysqli->query($sql);
                                  $consulta= $result->num_rows; 
                           ?>

                              <select name="id_profesor" class="form-control" onchange="pedirDatos()" required >
                                 <option value=''>Seleccione un Profesor</option>
                              <?php while ($reg = $result->fetch_array()){
                                      $num++;
                                      
                                      echo "<option value=\"".$reg['id_profesor']."\">".$reg['cedula_prof']." ".$reg['nombre_prof']." ".$reg['apellido_prof']."</option> \n";
                                      
                                }
                            ?>
                             </select> <br>
          <div class="form-group">
                          <label for="exampleInputPassword1">Sección</label>
                          <input type="text" name="seccion"  class="form-control" maxlength="1" onkeypress="return soloNumeros(event)" id="exampleInputPassword1" >
                        </div>
          <label>Observaciones</label>
          <textarea name="observaciones" minlength="20" maxlength="500" rows="15" required="" class="form-control"></textarea>
          <br>
          <button type="submit" class="btn btn-success">Guardar</button>
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>


<div class="modal" id="myModalObservacionesRes">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title">Registro de Observaciones Personas Responsables de Laboratorio</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="guardar/guardar_observaciones1.php" method="GET">
          <label>Persona Responsable</label>
          <?php
                                $sql=("SELECT * FROM responsables ORDER BY  id_responsable DESC");
                                  $result = $mysqli->query($sql);
                                  $consulta= $result->num_rows; 
                           ?>

                              <select name="id_responsable" class="form-control" onchange="pedirDatos()" required >
                                 <option value=''>Seleccione un Responsable</option>
                              <?php while ($reg = $result->fetch_array()){
                                      $num++;
                                      
                                      echo "<option value=\"".$reg['id_responsable']."\">".$reg['cedula_res']." ".$reg['nombre_res']." ".$reg['apellido_res']."</option> \n";
                                      
                                }
                            ?>
                             </select> <br>
        
          <label>Observaciones</label>
          <textarea name="observaciones" minlength="20" maxlength="500" rows="15" required="" class="form-control"></textarea>
          <br>
          <button type="submit" class="btn btn-success">Guardar</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>

      <!-- Modal footer -->
      

    </div>
  </div>
</div>

  <script src="../vendors/js/vendor.bundle.base.js"></script>
  <script src="../vendors/js/vendor.bundle.addons.js"></script>
  <script src="../js/off-canvas.js"></script>
  <script src="../js/misc.js"></script>
  <script src="../js/dashboard.js"></script>

</body>
</html>
