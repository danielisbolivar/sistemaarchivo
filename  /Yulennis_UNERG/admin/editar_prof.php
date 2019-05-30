<?php 
include('../conexion.php');
include('menu.php'); 
?>

<?php 
$id_profesor = $_GET['id_profesor'];
$sql = ("SELECT   * FROM profesores 
                      	          INNER JOIN telefono ON profesores.id_profesor = telefono.id_profesor
								  INNER JOIN email  ON profesores.id_profesor = 
								       email.id_profesor
								  INNER JOIN direccion  ON profesores.id_profesor = 
								  direccion.id_profesor
                  INNER JOIN usuarios_admin  ON profesores.id_profesor = 
                  usuarios_admin.id_profesor
								  WHERE profesores.id_profesor = $id_profesor");


$result=$mysqli->query($sql);
$num = $result->num_rows;
if ($num > 0){

$row = $result->fetch_assoc();

?>

<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h3 align="center">Modificar Datos del  Profesor</h3><hr>
                  <form class="form-sample" action="editar/editar_profesor.php" method="GET">
                    <p class="card-description">
                      <h5>Datos encontrados</h5>
                      <?php include('../alert.php'); ?>
                    </p><hr>
                     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Cedula</label>
                          <div class="col-sm-9">
                          	<input type="hidden"  name="id_profesor" value="<?php echo $row['id_profesor']; ?>" />

                            <input type="text"  name="cedula_prof" value="<?php echo $row['cedula_prof']; ?>" onBlur="comprobarUsuario()" id='cedula_prof' class="form-control" disabled />
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
                            <input type="text" value="<?php echo $row['nombre_prof']; ?>" onkeypress="return soloLetras(event)" name="nombre_prof" class="form-control" required/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Apellidos</label>
                          <div class="col-sm-9">
                            <input type="text" value="<?php echo $row['apellido_prof']; ?>" onkeypress="return soloLetras(event)" name="apellido_prof" class="form-control" required />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tlf.</label>
                          <div class="col-sm-9">
                            <input type="text" value="<?php echo $row['telefono']; ?>" onkeypress="return soloNumeros(event)" class="form-control" name="telefono" placeholder="" required/>
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
                           </p><br>

                            
                           
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

                    <a href="consulta_general_prof.php?pagina=1"><button type="button" class="btn btn-dark  btn-sm"> Regresar</button></a>
                  </form>
                  <?php
					}else{
					  echo "<script> alert('Datos no encontrados')</script>";
					  echo "<meta http-equiv='refresh' content='0;url=consulta_general_prof.php?pagina=1'>";
					} 
					?>
                </div>
              </div>
            </div>
          </div>

<!--FIN DEL FORMULARIO DE REGISTRO DE CARRERA-->

      

    <!--Cerrando los Div q no cerre en el archivo menu-->
  <?php include('../footer.php'); ?>