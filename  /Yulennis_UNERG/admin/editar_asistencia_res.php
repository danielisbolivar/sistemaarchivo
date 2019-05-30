<?php 

include('../conexion.php');
include('menu.php');

$id_asistencia = $_GET['id_asistencia'];


 $sql = ("SELECT   * FROM asistencia 
                                  INNER JOIN responsables ON responsables.id_responsable = asistencia.id_responsable
                                 WHERE asistencia.id_asistencia = '$id_asistencia'");

$result=$mysqli->query($sql);
$num = $result->num_rows;
if ($num > 0){

$row = $result->fetch_assoc();


?>


<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4>Modificar Asistencia del Responsable del Laboratorio</h4><hr>
                      <p class="card-description">
                        <?php include('../alert.php'); ?>
                        Datos encontrados
                      </p><hr>
                      <form class="forms-sample" action="editar/editar_asistencia_res.php" method="GET">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Eligue un Profesor</label>
                          
                           <?php
                                $sql=("SELECT * FROM responsables ORDER BY  nombre_res ASC");
                                  $result = $mysqli->query($sql);
                                  $consulta= $result->num_rows; 
                           ?>

                              <select name="id_responsable" class="form-control" onchange="pedirDatos()" required >
                                 <option value="<?php echo $row['id_responsable']; ?>"><?php echo $row['nombre_res']; ?>&nbsp;<?php echo $row['apellido_res']; ?></option>
                              <?php while ($reg = $result->fetch_array()){
                                      $num++;
                                      
                                      echo "<option value=\"".$reg['id_responsable']."\">".$reg['nombre_res']." ".$reg['apellido_res']."</option> \n";
                                      
                                }
                            ?>
                             </select> 
                               
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Hora de Entrada</label>
                          <input type="hidden" name="id_asistencia" value="<?php echo $row['id_asistencia']; ?>">
                          
                          <input type="time" name="hora1" value="<?php echo $row['hora1']; ?>" class="form-control" id="exampleInputPassword1" >
                        </div>

                        <div class="form-group">
                          <label for="exampleInputPassword1">Hora de Salida</label>
                          <input type="time" name="hora2" value="<?php echo $row['hora2']; ?>" class="form-control" id="exampleInputPassword1" >
                        </div>

                        

                        <button type="submit" class="btn btn-success mr-2">Modificar</button>
                        <a href="consulta_asistencia_hoy_res.php?pagina=1"><button type="button" class="btn btn-light">Regresar</button></a>
                      </form>
                             <?php
                        }else{
                          echo "<script> alert('Datos no encontrados')</script>";
                          echo "<meta http-equiv='refresh' content='0;url=consulta_asistencia_hoy_res.php?pagina=1'>";
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