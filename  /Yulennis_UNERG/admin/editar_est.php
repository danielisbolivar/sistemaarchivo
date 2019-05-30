<?php 
include('../conexion.php');
include('menu.php'); 
?>

<?php 
$id_estudiante = $_GET['id_estudiante'];
$sql = ("SELECT   * FROM estudiantes 
                      	          INNER JOIN telefono ON estudiantes.id_estudiante = telefono.id_estudiante
								  INNER JOIN email  ON estudiantes.id_estudiante = 
								       email.id_estudiante
								  INNER JOIN direccion  ON estudiantes.id_estudiante = 
								  direccion.id_estudiante
								  WHERE estudiantes.id_estudiante = $id_estudiante");


$result=$mysqli->query($sql);
$num = $result->num_rows;
if ($num > 0){

$row = $result->fetch_assoc();

?>

<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h3 align="center">Modificar Datos del  Estudiante</h3><hr>
                  <form class="form-sample" action="editar/editar_estudiante.php" method="GET">
                    <p class="card-description">
                      <h5>Datos encontrados</h5>
                      <?php include('../alert.php'); ?>
                    </p><hr>
                     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Cedula</label>
                          <div class="col-sm-9">
                          	<input type="hidden"  name="id_estudiante" value="<?php echo $row['id_estudiante']; ?>" />

                            <input type="text"  name="cedula_est" value="<?php echo $row['cedula_est']; ?>" onBlur="comprobarUsuario()" id='cedula_est' class="form-control" disabled />
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
                            <input type="text" value="<?php echo $row['nombre_est']; ?>" name="nombre_est" class="form-control" required/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Apellidos</label>
                          <div class="col-sm-9">
                            <input type="text" value="<?php echo $row['apellido_est']; ?>" name="apellido_est" class="form-control" required />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tlf.</label>
                          <div class="col-sm-9">
                            <input type="text" value="<?php echo $row['telefono']; ?>" class="form-control" name="telefono" placeholder="" required/>
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
                              <option value="Calabozo">Calabozo</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary"> Modificar</button>

                    <a href="consulta_general_est.php?pagina=1"><button type="button" class="btn btn-dark  btn-sm"> Regresar</button></a>
                  </form>
                  <?php
					}else{
					  echo "<script> alert('Datos no encontrados')</script>";
					  echo "<meta http-equiv='refresh' content='0;url=consulta_general_est.php?pagina=1'>";
					} 
					?>
                </div>
              </div>
            </div>
          </div>

<!--FIN DEL FORMULARIO DE REGISTRO DE CARRERA-->

      

    <!--Cerrando los Div q no cerre en el archivo menu-->
  <?php include('../footer.php'); ?>