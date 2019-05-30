<?php 
include('../conexion.php');
include('menu.php'); 
?>

<?php 
$id_usuario = $_GET['id_usuario'];
$sql = ("SELECT   * FROM usuarios_admin WHERE id_usuario = '$id_usuario'");


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
                  <h3 align="center">Modificar Usuario Profesor</h3><hr>
                  <form class="form-sample" action="editar/editar_usuarios.php" method="GET">
                    <p class="card-description">
                      <h5>Datos encontrados</h5>
                      <?php include('../alert.php'); ?>
                    </p><hr>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Nombre</label>
                          <div class="col-sm-9">
                            <input type="hidden" name="id_usuario" value="<?php echo $row['id_usuario']; ?>">
                            <input type="text" value="<?php echo $row['nombre']; ?>" onkeypress="return soloLetras(event)" name="nombre" class="form-control" required/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Email</label>
                          <div class="col-sm-9">
                            <input type="email" value="<?php echo $row['usuario']; ?>" class="form-control" name="usuario" onBlur="comprobarEmail()" id='email' placeholder="" required/>
                            <span id="estadoemail"></span> 
                           </div>
                           <p>
                            <img src="LoaderIcon.gif" id="loaderIconEmail" style="display:none" />
                           </p>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Password</label>
                          <div class="col-sm-9">
                            <input type="password" value="<?php echo $row['pwd']; ?>" class="form-control" name="password" required/>
                           </div>
                        </div>

                      </div>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary"> Modificar</button>

                    <a href="usuarios.php"><button type="button" class="btn btn-dark  btn-sm"> Regresar</button></a>
                  </form>
                  <?php
					}else{
					  echo "<script> alert('Datos no encontrados')</script>";
					  echo "<meta http-equiv='refresh' content='0;url=usuarios.php'>";
					} 
					?>
                </div>
              </div>
            </div>
          </div>


    <?php include('../footer.php'); ?>