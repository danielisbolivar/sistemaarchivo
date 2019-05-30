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
  data:'codigo_producto='+$("#codigo_producto").val(),
  type: "POST",
  success:function(data){
    $("#estadousuario").html(data);
    $("#loaderIcon").hide();
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
                  <h3 align="center">Registro de Inventario</h3><hr>
                  <form class="form-sample" action="guardar/guardar_producto.php" method="POST">
                    <p class="card-description">
                      <?php include('../alert.php'); ?>
                    </p>
                     <div class="row">
                      <div class="col-md-6">

                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Categoría</label>
                          <div class="col-sm-9">
                            <?php
                                $sql=("SELECT * FROM categorias");
                                  $result = $mysqli->query($sql);
                                  $consulta= $result->num_rows; 
                           ?>

                              <select name="id_categoria" class="form-control" onchange="pedirDatos()" required >
                                 <option value=''>Seleccione una Categoría</option>
                              <?php while ($reg = $result->fetch_array()){
                                      $num++;
                                      
                                      echo "<option value=\"".$reg['id_categoria']."\">".$reg['categoria']." </option> \n";
                                      
                                }
                            ?>
                             </select> 
                          </div>
                         
                        </div>
                      </div>
                    </div>
                     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Codigo</label>
                          <div class="col-sm-9">
                            <input type="text"  name="codigo_producto" onBlur="comprobarUsuario()" id='codigo_producto' class="form-control" required/>
                            <span id="estadousuario"></span>
                          </div>
                          <p>
                            <img src="LoaderIcon.gif" id="loaderIcon" style="display:none" />
                          </p>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Marca</label>
                          <div class="col-sm-9">
                            <input type="text" name="marca" class="form-control" required />
                          </div>
                        </div>
                      </div>
                    </div>


                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Nombre del Producto ó Equipo</label>
                          <div class="col-sm-9">
                            <input type="text" name="nombre_equipo" class="form-control" required/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Cantidad</label>
                          <div class="col-sm-9">
                            <input type="number" onkeypress="return soloNumeros(event)" name="cantidad" class="form-control" required />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Estado</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="estado" required>
                              <option value="">Seleccione...</option>
                              <option value="bueno">Bueno</option>
                              <option value="regular">Regular</option>
                              <option value="dañado">Dañado</option>
                              <option value="en reparacion">En Reparación</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Ubicación</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="ubicacion"  placeholder="" required/>
                           </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Detalles</label>
                          <div class="col-sm-9">
                            <textarea class="form-control" name="detalle" rows="7" required></textarea>
                          </div>
                        </div>
                      </div>
                         <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Sede de la Unerg</label>
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
                      </div>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-success"><i class="mdi mdi-check"></i> Guardar</button>

                    <button type="reset" class="btn"><i class="mdi mdi-close-box-outline"></i> Cancelar</button>
                  </form>
                </div>
              </div>
<!--FIN DEL FORMULARIO DE REGISTRO DE CARRERA-->
  
 <?php include('../footer.php'); ?>


            </div>
          </div>