<?php
// LLAMO AL ARCHIVO menu.php
 require_once "class/class.php";
 require_once "menu.php";
 require_once "conexion.php";

 $obj= new Trabajo();
                         //CONSULTA SQL
                         $id_carrera = $_GET['id_carrera'];
                         $sql="SELECT id_carrera, carrera from carrera where id_carrera = '$id_carrera'"; 
                         $datos=$obj->datos_encontrados_carrera($sql);
                         
                         foreach ($datos as $key) {

?>




<!--FORMULARIO DE REGISTRO DE CARRERA-->
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Datos Encontrados</h4>
                  <?php include('alert.php'); ?>
                  <form class="forms-sample" id="combo" name="combo" action="editar/editar_carrera.php" method="GET">
                    <div class="form-group">
                      <label for="exampleInputName1">Nombre de la Carrera</label>
                      <input type="hidden" name="id_carrera"  value="<?php echo $key['id_carrera']; ?>">
                      <input type="text" name="carrera"  value="<?php echo $key['carrera']; ?>"  class="form-control" id="exampleInputName1" placeholder="Nombre de la Carrera" required="">
                    </div>
                    <button type="submit" class="btn btn-success mr-2">Actualizar</button>
                    <a href="consulta_carrera.php"><button type="button" class="btn btn-light">Regresar</button></a>
                  </form>

                <?php 
                           }
                         ?>

                </div>
              </div>
            </div>
<!--FIN DEL FORMULARIO DE REGISTRO DE CARRERA-->

      

    <!--Cerrando los Div q no cerre en el archivo menu-->
    <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2019
              <a href=" target="_blank">Aplicación WEB APPS</a>. Derechos de Autores Reservados.</span>
          </div>
        </footer>
      </div>
    </div>
  </div>