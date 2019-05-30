<?php 
  include('../conexion.php');
  include('menu.php');
?>

<!--FORMULARIO DE REGISTRO DE CARRERA-->
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Agregar Carrera</h4>
                  <?php include('alert.php'); ?>
                  <form class="forms-sample" id="combo" name="combo" action="guardar/guardar.php" method="POST">
                    <div class="form-group">
                      <label for="exampleInputName1">Nombre de la Carrera</label>
                      <input type="text" name="carrera" class="form-control" id="exampleInputName1" placeholder="Nombre de la Carrera" required="">
                    </div>
                    <button type="submit" class="btn btn-success mr-2">Guardar</button>
                    <button type="reset" class="btn btn-light">Cancelar</button>
                  </form>
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