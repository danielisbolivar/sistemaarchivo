<?php 
  include('../conexion.php');
  include('menu.php');
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
  data:'cedula_prof='+$("#cedula_prof").val(),
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
  url: "ComprobarDisponibilidad.php",
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

<!--FORMULARIO DE REGISTRO DE CARRERA-->
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h3 align="center">Registrar Profesor</h3><hr>
                  <form class="form-sample" action="guardar/guardar_profesor.php" method="POST">
                    <p class="card-description">
                      <h5>Información Personal</h5>
                      <?php include('../alert.php'); ?>
                    </p><hr>
                     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Cedula</label>
                          <div class="col-sm-9">
                            <input type="text"  name="cedula_prof" onBlur="comprobarUsuario()" id='cedula_prof' class="form-control"  onkeypress="return soloNumeros(event)" maxlength="8" required/>
                            <span id="estadousuario"></span>
                          </div>
                          <p>
                            <img src="LoaderIcon.gif" id="loaderIcon" style="display:none" />
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Nombres</label>
                          <div class="col-sm-9">
                            <input type="text" onkeypress="return soloLetras(event)" name="nombre_prof" class="form-control" required/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Apellidos</label>
                          <div class="col-sm-9">
                            <input type="text" onkeypress="return soloLetras(event)" name="apellido_prof" class="form-control" required/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tlf.</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="telefono" onkeypress="return soloNumeros(event)" maxlength="11" placeholder="" required/>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Sede de la UNERG</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="sede" required>
                              <option value="">Seleccione una Sede</option>
                              <option value="San Juan de los Morros">San Juan de los Morros</option>
                              <option value="Ortiz">Ortiz</option>
                              <option value="Mellado">Mellado</option>
                              <option value="Calabozo">Calabozo</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Dirección</label>
                          <div class="col-sm-9">
                            <textarea class="form-control" name="direccion" rows="7" minlength="10" maxlength="200" required></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"></label>
                          <div class="col-sm-9">
                            <!--Crear Usuario a Profesores-->
                            <div class="alert alert-primary">
                              Crear Usuario a Profesor <br><br>  
                            <input type="email" class="form-control" name="email" onBlur="comprobarEmail()" id='email' placeholder="Email" required/>
                            <span id="estadoemail"></span> 
                            <p>
                            <img src="LoaderIcon.gif" id="loaderIconEmail" style="display:none" />
                           </p>
                            
                            
                            <input type="password" class="form-control" name="password"  placeholder="Password" required/>
                            </div>
                            <!--Fin del Crer usuario-->
                           </div>
                           
                        </div>
                      </div>

                    </div>
                    
                    <hr>
                    <button type="submit" class="btn btn-success"><i class="mdi mdi-check"></i> Guardar</button>

                    <button type="reset" class="btn"><i class="mdi mdi-close-box-outline"></i> Cancelar</button>
                  </form>
                </div>
              </div>
            </div>
          </div>

<!--FIN DEL FORMULARIO DE REGISTRO DE CARRERA-->
    <!--Cerrando los Div q no cerre en el archivo menu-->
    <?php include('../footer.php'); ?>