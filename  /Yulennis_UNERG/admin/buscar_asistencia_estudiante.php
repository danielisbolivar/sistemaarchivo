<?php 
   include('../conexion.php'); 
   include('menu.php');

   $query = "SELECT * FROM profesores ORDER BY cedula_prof DESC";
   $resultado=$mysqli->query($query);

?><!-- The Modal -->
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
                      <h4>Buscar Lista Asistencia de los Estudiantes, por Profesor, Materia, Sección y Fecha</h4><hr>
                      <p class="card-description">
                        <?php include('../alert.php'); ?>
                      </p>

                      <?php 
         $query = "SELECT * FROM profesores ORDER BY cedula_prof DESC";
         $resultado=$mysqli->query($query);
        ?>
      <!-- Modal body -->
     
        <form  action="consulta_de_asistencia.php" method="GET">

              <div>Consultar por Fecha : 
                <input type="date" name="fecha1" class="form-control">
                <input type="date" name="fecha2" class="form-control">
              </div><br>
   
              <div>Profesor : 
                 <select class="form-control" name="profesor" id="cbx_estado" required>
                    <option value="">Seleccione un Profesor</option>
                    <?php while($row = $resultado->fetch_assoc()) { ?>
                    <option value="<?php echo $row['id_profesor']; ?>"><?php echo $row['cedula_prof']; ?> <?php echo $row['nombre_prof']; ?> <?php echo $row['apellido_prof']; ?></option>
                   <?php } ?>
               </select>
             </div>
                        
               <div>Materia : <select class="form-control" name="materia" id="cbx_municipio" required></select></div>
                        
               <br />
                        
                <div>Sección : <select class="form-control" name="seccion" id="cbx_localidad" required></select></div>
                <br>
                <input type="submit" class="btn btn-success" id="enviar" name="enviar" value="Buscar" />

                <button type="reset" class="btn">Cancelar</button>

        </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>



   

      <!-- Modal Header -->
     
       
      

      <!-- Modal footer -->
   