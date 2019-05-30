<!DOCTYPE html>
<html lang="en">
  <head>
    <title>UNERG - Area de Ingenieria de Sistemas</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="login/fonts/icomoon/style.css">
    <link rel="stylesheet" href="login/css/bootstrap.min.css">
    <link rel="stylesheet" href="login/css/magnific-popup.css">
    <link rel="stylesheet" href="login/css/jquery-ui.css">
    <link rel="stylesheet" href="login/css/owl.carousel.min.css">
    <link rel="stylesheet" href="login/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="login/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="login/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="login/css/aos.css">
    <link rel="stylesheet" href="login/css/style.css">
  </head>
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


  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  <div class="site-wrap"  id="home-section">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
   
      
    <header class="site-navbar js-sticky-header site-navbar-target" role="banner">

      <div class="container">
        <div class="row align-items-center position-relative">
          
            
            <div class="site-logo">
              <a href="index.php" class="text-black"><span class="text-primary"><font color="#5882FA">Informática UNERG</font></a>
            </div>
            
              <nav class="site-navigation text-center ml-auto" role="navigation">

                <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                  <li><a href="index.php" class="">Inicio</a></li>
                  <li><a  data-toggle="modal" href="#myModal" class="">Registrate en Nuestro Censo</a>
                  <?php include('alert.php'); ?></li>
                  <li><a href="login.php">Iniciar Sesión - Solo Profesores</a></li>
                </ul>
              </nav>
          
            

          <div class="toggle-button d-inline-block d-lg-none"><a href="#" class="site-menu-toggle py-5 js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

        </div>
      </div>
      
    </header>
    
    <div class="owl-carousel slide-one-item">
      <a href="#"><img src="login/images/informatica.jpg" alt="Image" class="img-fluid"></a>
      <a href="#"><img src="login/images/result-21-1.jpg" alt="Image" class="img-fluid"></a>
      <a href="#"><img src="login/images/2bP4pJr4wVimqCWjYimXJe2cnCgnGcDqQRVyGsn81C2.jpg" alt="Image" class="img-fluid"></a>
    </div>
  </div>




   


    <footer class="site-footer"><center>
    	Informática - UNERG - Area de Ingenieria de Sistemas
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> <br>Todos los derechos de Autores Reselvados | Yulennis Perales <br><i class="icon-heart" aria-hidden="true"></i>  <a href="" target="_blank" >Somos Informática - UNERG</a>
   </center></footer>

  </div>

  <script src="login/js/jquery-3.3.1.min.js"></script>
  <script src="login/js/jquery-ui.js"></script>
  <script src="login/js/popper.min.js"></script>
  <script src="login/js/bootstrap.min.js"></script>
  <script src="login/js/owl.carousel.min.js"></script>
  <script src="login/js/jquery.magnific-popup.min.js"></script>
  <script src="login/js/jquery.sticky.js"></script>
  <script src="login/js/jquery.waypoints.min.js"></script>
  <script src="login/js/jquery.animateNumber.min.js"></script>
  <script src="login/js/aos.js"></script>

  <script src="login/js/main.js"></script>
  


  <!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Censo de Estudiantes - Registrate</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form class="form-sample" action="admin/guardar/guardar_estudiante1.php" method="POST">
                    <p class="card-description">
                      <h5>Información Personal</h5>
                    </p><hr>
                     <div class="row">
                      <div class="col-md-10">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Cedula</label>
                          <div class="col-sm-9">

                            <input type="text"  name="cedula_est" onBlur="comprobarUsuario()" id='cedula_est' class="form-control" maxlength="8" onkeypress="return soloNumeros(event)" required/>
                            <span id="estadousuario"></span>
                          </div>
                          <p>
                            <img src="admin/LoaderIcon.gif" id="loaderIcon" style="display:none" />
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-10">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Nombres</label>
                          <div class="col-sm-9">
                            <input type="text" name="nombre_est" class="form-control" onkeypress="return soloLetras(event)" required/>
                          </div>
                        </div>
                         <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Apellidos</label>
                          <div class="col-sm-9">
                            <input type="text" name="apellido_est" class="form-control" onkeypress="return soloLetras(event)"  required />
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tlf.</label>
                          <div class="col-sm-9">
                            <input type="text" maxlength="11" class="form-control" onkeypress="return soloNumeros(event)" name="telefono" placeholder="" required/>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Email</label>
                          <div class="col-sm-9">
                            <input type="email" class="form-control" name="email" onBlur="comprobarEmail()" id='email' placeholder="" required/>
                            <span id="estadoemail"></span> 
                           </div>
                           <p>
                            <img src="admin/LoaderIcon.gif" id="loaderIconEmail" style="display:none" />
                           </p>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Dirección</label>
                          <div class="col-sm-9">
                            <textarea class="form-control" name="direccion" rows="7" minlength="10" maxlength="200" required></textarea>
                          </div>
                        </div>
                         <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Sede de la Unerg</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="sede" required>
                              <option value="">Seleccione una Sede</option>
                              <option value="San Juan de los Morros">San Juan de los Morros</option>
                              <option value="Ortiz">Ortiz</option>
                              <option value="Mellado">Mellado</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-success"><i class="mdi mdi-check"></i> Guardar</button>

                    <button type="reset" class="btn"><i class="mdi mdi-close-box-outline"></i> Cancelar</button>
                  </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>

  </body>
</html>