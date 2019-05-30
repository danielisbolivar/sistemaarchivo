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
  data:'hora1='+$("#hora1").val(),
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
  data:'dia='+$("#dia").val(),
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

<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4>Asignar Materia a Profesores</h4><hr>
                      <p class="card-description">
                        <?php include('../alert.php'); ?>
                      </p>
                      <form class="forms-sample" action="guardar/guardar_asignacion_prof.php" method="GET">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Eligue un Profesor</label>
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
                             </select> 
                               
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Eligue una Materia</label>
                           <?php
                                $sql=("SELECT * FROM materia ORDER BY  id_materia DESC");
                                  $result = $mysqli->query($sql);
                                  $consulta= $result->num_rows; 
                           ?>

                              <select name="id_materia" class="form-control" onchange="pedirDatos()" >
                              <option value=''>Seleccione una Materia</option>
                              <?php while ($reg = $result->fetch_array()){
                                      $num++;
                                      
                                      echo "<option value=\"".$reg['id_materia']."\">".$reg['materia']."</option> \n";
                                      
                                }
                            ?>
                             </select> 
                               
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Sección</label>
                          <input type="text" name="seccion"  class="form-control" maxlength="1" onkeypress="return soloNumeros(event)" id="exampleInputPassword1" >
                        </div>
                         
                        <div class="form-group">
                          <label for="exampleInputPassword1">Dia</label>
                          <select name="dia" class="form-control">
                            <option value="">Seleccione un Dia</option>
                            <option value="lunes">Lunes</option>
                            <option value="martes">Martes</option>
                            <option value="miercoles">Miercoles</option>
                            <option value="jueves">Jueves</option>
                            <option value="viernes">Viernes</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="exampleInputPassword1">Hora de Entrada</label>
                          <input type="time" name="hora1"  class="form-control" id="exampleInputPassword1" >
                        </div>

                        <div class="form-group">
                          <label for="exampleInputPassword1">Hora de Salida</label>
                          <input type="time" name="hora2"  class="form-control" id="exampleInputPassword1" >
                        </div>

                        <div class="form-group">
                          <label for="exampleInputPassword1">Aula_Laboratorio</label>
                          <input type="text" onkeypress="return soloNumeros(event)" maxlength="1" name="aula_lab"  class="form-control" id="exampleInputPassword1" >
                        </div>

                        <button type="submit" class="btn btn-success mr-2">Guardar</button>
                        <button type="reset" class="btn btn-light">Cancelar</button>
                      </form>
                       
                    </div>
                  </div>
                </div>
              </div>
            </div>



<!--FIN DEL FORMULARIO DE REGISTRO DE CARRERA-->

      

    <!--Cerrando los Div q no cerre en el archivo menu-->
    <?php include('../footer.php'); ?>