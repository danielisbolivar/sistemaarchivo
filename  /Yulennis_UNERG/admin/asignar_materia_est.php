<?php 
include('../conexion.php');
include('menu.php');

$query = "SELECT * FROM profesores ORDER BY cedula_prof DESC";
$resultado=$mysqli->query($query);

?>

<script language="javascript" src="js/jquery-3.1.1.min.js"></script>
    
    <script language="javascript">
      $(document).ready(function(){
        $("#cbx_estado").change(function () {

          $('#cbx_localidad').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
          
          $("#cbx_estado option:selected").each(function () {
            id_profesor = $(this).val();
            $.post("includes/getMunicipio.php", { id_profesor: id_profesor }, function(data){
              $("#cbx_municipio").html(data);
            });            
          });
        })
      });
      
      $(document).ready(function(){
        $("#cbx_municipio").change(function () {
          $("#cbx_municipio option:selected").each(function () {
            id_materia = $(this).val();
            $.post("includes/getLocalidad.php", { id_materia: id_materia }, function(data){
              $("#cbx_localidad").html(data);
            });            
          });
        })
      });
    </script>


<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4>Asignar Materia a Estudiante</h4><hr>
                      <p class="card-description">
                        <?php include('../alert.php'); ?>
                      </p>
                       
                      <form  action="guardar/guardar_asignacion_est.php" method="POST">
                        <div>Estudiante :
                           <?php
                                $sql=("SELECT * FROM estudiantes ORDER BY  cedula_est DESC");
                                  $result = $mysqli->query($sql);
                                  $consulta= $result->num_rows; 
                           ?>

                              <select name="id_estudiante" class="form-control" onchange="pedirDatos()" required >
                                 <option value=''>Seleccione un Estudiante</option>
                              <?php while ($reg = $result->fetch_array()){
                                      $num++;
                                      
                                      echo "<option value=\"".$reg['id_estudiante']."\">".$reg['cedula_est']." ".$reg['nombre_est']." ".$reg['apellido_est']."</option> \n";
                                      
                                }
                            ?>
                             </select> 
                               
                        </div><br>


                        <div>Profesor : <select class="form-control" name="profesor" id="cbx_estado" required>
                          <option value="">Seleccione un Profesor</option>
                          <?php while($row = $resultado->fetch_assoc()) { ?>
                            <option value="<?php echo $row['id_profesor']; ?>"><?php echo $row['cedula_prof']; ?> <?php echo $row['nombre_prof']; ?> <?php echo $row['apellido_prof']; ?></option>
                          <?php } ?>
                        </select></div>
                        
                        <br />
                        
                        <div>Materia : <select class="form-control" name="materia" id="cbx_municipio" required></select></div>
                        
                        <br />
                        
                        <div>Sección : <select class="form-control" name="seccion" id="cbx_localidad" required></select></div>
                        
                        <br />

                        <input type="submit" class="btn btn-success" id="enviar" name="enviar" value="Guardar" />

                        <button type="reset" class="btn">Cancelar</button>

                      </form>

                    </div>
                  </div>
                </div>
              </div>
            </div>


</div>
</div>
</div>

