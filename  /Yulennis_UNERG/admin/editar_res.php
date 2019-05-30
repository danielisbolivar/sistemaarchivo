<?php 
include('../conexion.php');
include('menu.php'); 
?>

<?php 
$id_responsable = $_GET['id_responsable'];
$sql = ("SELECT   * FROM responsables 
                      	          INNER JOIN telefono ON responsables.id_responsable = telefono.id_responsable
								  INNER JOIN email  ON responsables.id_responsable = 
								       email.id_responsable
								  INNER JOIN direccion  ON responsables.id_responsable = 
								  direccion.id_responsable
								  WHERE responsables.id_responsable = $id_responsable");


$result=$mysqli->query($sql);
$num = $result->num_rows;
if ($num > 0){

$row = $result->fetch_assoc();

?>
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


<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h3 align="center">Modificar Datos del Responsable de Laboratorio</h3><hr>
                  <form class="form-sample" action="editar/editar_responsable.php" method="GET">
                    <p class="card-description">
                      <h5>Datos encontrados</h5>
                      <?php include('../alert.php'); ?>
                    </p><hr>
                     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Cedula</label>
                          <div class="col-sm-9">
                          	<input type="hidden"  name="id_responsable" value="<?php echo $row['id_responsable']; ?>" />

                            <input type="text"  name="cedula_est" value="<?php echo $row['cedula_res']; ?>" onBlur="comprobarUsuario()" id='cedula_res' maxlength="8" onkeypress="return soloNumeros(event)" class="form-control" disabled />
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
                            <input type="text" value="<?php echo $row['nombre_res']; ?>" onkeypress="return soloLetras(event)" name="nombre_res" class="form-control" required/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Apellidos</label>
                          <div class="col-sm-9">
                            <input type="text" value="<?php echo $row['apellido_res']; ?>" onkeypress="return soloLetras(event)" name="apellido_res" class="form-control" required />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tlf.</label>
                          <div class="col-sm-9">
                            <input type="text" value="<?php echo $row['telefono']; ?>" onkeypress="return soloNumeros(event)" maxlength="11" class="form-control" name="telefono" placeholder="" required/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Email</label>
                          <div class="col-sm-9">
                            <input type="email" value="<?php echo $row['email']; ?>" class="form-control" name="email" onBlur="comprobarEmail()" id='email' placeholder="" required/>
                            <span id="estadoemail"></span> 
                           </div>
                           <p>
                            <img src="LoaderIcon.gif" id="loaderIconEmail" style="display:none" />
                           </p>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Dirección</label>
                          <div class="col-sm-9">
                            <textarea class="form-control" name="direccion" rows="7" required><?php echo $row['direccion']; ?></textarea>
                          </div>
                        </div>
                      </div>
                         <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Sede de la Unerg</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="sede" required>
                              <option value="<?php echo $row['sede']; ?>"><?php echo $row['sede']; ?></option>
                              <option value="San Juan de los Morros">San Juan de los Morros</option>
                              <option value="Ortiz">Ortiz</option>
                              <option value="Mellado">Mellado</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary"> Modificar</button>

                    <a href="consulta_general_res.php?pagina=1"><button type="button" class="btn btn-dark  btn-sm"> Regresar</button></a>
                  </form>
                  <?php
					}else{
					  echo "<script> alert('Datos no encontrados')</script>";
					  echo "<meta http-equiv='refresh' content='0;url=consulta_general_res.php?pagina=1'>";
					} 
					?>
                </div>
              </div>
            </div>
          </div>

<!--FIN DEL FORMULARIO DE REGISTRO DE CARRERA-->

      

    <!--Cerrando los Div q no cerre en el archivo menu-->
   <?php include('../footer.php'); ?>