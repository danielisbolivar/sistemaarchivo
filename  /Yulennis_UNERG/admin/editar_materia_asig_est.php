<?php 

include('../conexion.php');
include('menu.php');

$id_asig_est = $_GET['id_asig_est'];


$sql = ("SELECT  * FROM asig_estudiantes 
                                  INNER JOIN materia ON asig_estudiantes.id_materia = materia.id_materia
                                  INNER JOIN estudiantes ON estudiantes.id_estudiante = asig_estudiantes.id_estudiante
                                  INNER JOIN profesores ON profesores.id_profesor = asig_estudiantes.id_profesor
                                  WHERE
                                  asig_estudiantes.id_asig_est = '$id_asig_est'");

$result=$mysqli->query($sql);
$num = $result->num_rows;
if ($num > 0){

$row = $result->fetch_assoc();


?>

<?php 
  $query1 = "SELECT * FROM profesores ORDER BY nombre_prof";
  $resultado=$mysqli->query($query1);


  $queryM = ("SELECT  * FROM asig_estudiantes 
                                  INNER JOIN materia ON asig_estudiantes.id_materia = materia.id_materia
                                  WHERE
                                  asig_estudiantes.id_asig_est = '$id_asig_est'");
  $resultadoM = $mysqli->query($queryM);


  $queryS = ("SELECT  * FROM asig_estudiantes 
                                  INNER JOIN materia ON asig_estudiantes.id_materia = materia.id_materia
                                  WHERE
                                  asig_estudiantes.id_asig_est = '$id_asig_est'");
  $resultadoS = $mysqli->query($queryS);

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
                      <h4>Modificar Materia a Estudiantes Asignadas</h4><hr>
                      <p class="card-description">
                        <?php include('../alert.php'); ?>
                        Datos encontrados
                      </p><hr>
                      <form  action="editar/editar_materia_asig_est.php" method="GET">
                        <input type="hidden" name="id_asig_est" value="<?php echo $row['id_asig_est']; ?>">
                        <div>Estudiante :
                           <?php
                                $sql=("SELECT * FROM estudiantes ORDER BY  id_estudiante DESC");
                                  $result = $mysqli->query($sql);
                                  $consulta= $result->num_rows; 
                           ?>

                              <select name="id_estudiante" class="form-control" onchange="pedirDatos()" required >
                                 <option value='<?php echo $row['id_estudiante']; ?>'><?php echo $row['nombre_est']; ?> <?php echo $row['apellido_est']; ?></option>
                              <?php while ($reg = $result->fetch_array()){
                                      $num++;
                                      
                                      echo "<option value=\"".$reg['id_estudiante']."\">".$reg['nombre_est']." ".$reg['apellido_est']."</option> \n";
                                      
                                }
                            ?>
                             </select> 
                               
                        </div><br>


                        <div>Profesor : <select class="form-control" name="profesor" id="cbx_estado" required>

                          <option value="<?php echo $row['id_profesor']; ?>"><?php echo $row['nombre_prof']; ?> <?php echo $row['apellido_prof']; ?></option>
                          <?php while($row = $resultado->fetch_assoc()) { ?>
                            <option value="<?php echo $row['id_profesor']; ?>"><?php echo $row['nombre_prof']; ?> <?php echo $row['apellido_prof']; ?></option>
                          <?php } ?>
                        </select></div>
                        
                        <br />
                        
                        <div>Materia : <select class="form-control" name="materia" id="cbx_municipio" required>
                          <?php while($rowM = $resultadoM->fetch_assoc()) { ?>
                          <option value="<?php echo $rowM['id_materia']; ?>" <?php if($rowM['id_materia']==$id_materia) { echo 'selected'; } ?>><?php echo $rowM['materia']; ?></option>
                        <?php } ?>
                        </select></div>
                        
                        <br />
                        
                        <div>Sección : <select class="form-control" name="seccion" id="cbx_localidad" required>
                          <?php while($rowS = $resultadoS->fetch_assoc()) { ?>
                          <option value="<?php echo $rowS['seccion']; ?>" <?php if($rowS['seccion']==$seccion) { echo 'selected'; } ?>><?php echo $rowS['seccion']; ?></option>
                        <?php } ?>
                        </select></div>
                        
                        <br />

                        <input type="submit" class="btn btn-success" id="enviar" name="enviar" value="Guardar" />

                        <a href="consulta_materia_asig_est.php?pagina=1"><button type="button" class="btn">Regresar</button></a>

                      </form>
                             <?php
                        }else{
                          echo "<script> alert('Datos no encontrados')</script>";
                          echo "<meta http-equiv='refresh' content='0;url=consulta_materia_asig_est.php?pagina=1'>";
                        } 
                        ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>



<!--FIN DEL FORMULARIO DE REGISTRO DE CARRERA-->

      

    <!--Cerrando los Div q no cerre en el archivo menu-->
  <?php include('../footer.php'); ?>