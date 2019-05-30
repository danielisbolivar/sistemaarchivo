<?php 

include('../conexion.php');
include('menu.php');

$id_prof_materia = $_GET['id_prof_materia'];
$sql = ("SELECT  * FROM prof_materias 
                      	          INNER JOIN materia ON prof_materias.id_materia = materia.id_materia
                      	          INNER JOIN profesores ON profesores.id_profesor = prof_materias.id_profesor WHERE prof_materias.id_prof_materia = '$id_prof_materia'");

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
                      <h4>Modificar Materia a Profesores Asignadas</h4><hr>
                      <p class="card-description">
                        <?php include('../alert.php'); ?>
                        Datos encontrados
                      </p><hr>
                      <form class="forms-sample" action="editar/editar_materia_asig_prof.php" method="GET">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Eligue un Profesor</label>
                          
                           <?php
                                $sql=("SELECT * FROM profesores ORDER BY  id_profesor DESC");
                                  $result = $mysqli->query($sql);
                                  $consulta= $result->num_rows; 
                           ?>

                              <select name="id_profesor" class="form-control" onchange="pedirDatos()" required >
                                 <option value="<?php echo $row['id_profesor']; ?>"><?php echo $row['nombre_prof']; ?>&nbsp;<?php echo $row['apellido_prof']; ?></option>
                              <?php while ($reg = $result->fetch_array()){
                                      $num++;
                                      
                                      echo "<option value=\"".$reg['id_profesor']."\">".$reg['nombre_prof']." ".$reg['apellido_prof']."</option> \n";
                                      
                                }
                            ?>
                             </select> 
                               
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Eligue una Materia</label>
                           <?php
                                $sql=("SELECT * FROM materia ORDER BY  id_materia DESC");
                                  $result = $mysqli->query($sql);
                                  $consulta= $result->num_rows; 
                           ?>

                              <select name="id_materia" class="form-control" onchange="pedirDatos()" >
                              <option value="<?php echo $row['id_materia']; ?>"><?php echo $row['materia']; ?></option>
                              <?php while ($reg = $result->fetch_array()){
                                      $num++;
                                      
                                      echo "<option value=\"".$reg['id_materia']."\">".$reg['materia']."</option> \n";
                                      
                                }
                            ?>
                             </select> 
                               
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Sección</label>
                          <input type="hidden" name='id_prof_materia' value="<?php echo $row['id_prof_materia']; ?>">
                          <input type="number" value="<?php echo $row['seccion']; ?>" name="seccion"  class="form-control" id="exampleInputPassword1" >
                        </div>
                         
                        <div class="form-group">
                          <label for="exampleInputPassword1">Dia</label>
                          <select name="dia" class="form-control">
                            <option value="<?php echo $row['dia']; ?>"><?php echo $row['dia']; ?></option>
                            <option value="lunes">Lunes</option>
                            <option value="martes">Martes</option>
                            <option value="miercoles">Miercoles</option>
                            <option value="jueves">Jueves</option>
                            <option value="viernes">Viernes</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="exampleInputPassword1">Hora de Entrada</label>
                          <input type="time" name="hora1" value="<?php echo $row['hora1']; ?>" class="form-control" id="exampleInputPassword1" >
                        </div>

                        <div class="form-group">
                          <label for="exampleInputPassword1">Hora de Salida</label>
                          <input type="time" name="hora2" value="<?php echo $row['hora2']; ?>" class="form-control" id="exampleInputPassword1" >
                        </div>

                        <div class="form-group">
                          <label for="exampleInputPassword1">Aula_Laboratorio</label>
                          <input type="number" value="<?php echo $row['aula_lab']; ?>" name="aula_lab"  class="form-control" id="exampleInputPassword1" >
                        </div>

                        <button type="submit" class="btn btn-success mr-2">Modificar</button>
                        <a href="consulta_materia_asig_prof.php?pagina=1"><button type="button" class="btn btn-light">Regresar</button></a>
                      </form>
                             <?php
                        }else{
                          echo "<script> alert('Datos no encontrados')</script>";
                          echo "<meta http-equiv='refresh' content='0;url=consulta_materia_asig_prof.php?pagina=1'>";
                        } 
                        ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>



<!--FIN DEL FORMULARIO DE REGISTRO DE CARRERA-->

      

    <!--Cerrando los Div q no cerre en el archivo menu-->
    <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2019
              <a href="">Valentina</a>. Derechos de Autores Reservados.</span>
          </div>
        </footer>
      </div>
    </div>
  </div>