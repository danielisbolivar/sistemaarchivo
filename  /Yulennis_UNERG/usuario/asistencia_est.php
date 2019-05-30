<?php 
include('menu.php');
include('../conexion.php'); 
?>

<script type="text/javascript">
  function ConfirmDelete()
  {
    var respuesta = confirm("Estas seguro de Borrar este registro?");
  if (respuesta == true) 
  {
    return true;

  }else{

    return false;
  }
}


</script>




<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <?php 
                    $usuario = $_SESSION["usuario"];
                    $sql = ("SELECT * FROM usuarios_admin WHERE usuario ='$usuario'");
                     $result = $mysqli->query($sql);
                     $consulta= $result->num_rows;
                     while ($reg = $result->fetch_array()){
                                      $num++;

                      $id = $reg['id_profesor'];          

                     }
                  ?>
                  

                  <h3 align="center">Control de Asistencia</h3>
                  <hr>
                   <?php include('../alert.php'); ?>
                  <div class="table-responsive">

                  <?php 
                  
                  $id_materia = $_GET['id_materia'];
                  $seccion = $_GET['seccion'];  


                      $sql = ("SELECT   * FROM estudiantes 
                      	          INNER JOIN asig_estudiantes ON estudiantes.id_estudiante = asig_estudiantes.id_estudiante
                                  INNER JOIN materia ON materia.id_materia = asig_estudiantes.id_materia
                                  INNER JOIN prof_materias ON prof_materias.id_materia = asig_estudiantes.id_materia WHERE asig_estudiantes.id_profesor = '$id' AND asig_estudiantes.id_materia = '$id_materia' AND asig_estudiantes.seccion = '$seccion'
								  Order by estudiantes.id_estudiante 
								  DESC ");

                      $result = $mysqli->query($sql);
                      $consulta= $result->num_rows; 
                  ?>
                   <form action="guardar/guardar_asistencia.php">
                    <table class="table table-hover">
                      <thead>
                        <tr bgcolor="#13a5db">
                          <th>#</th>
                          <th>Cedula</th>
                          <th>Nombres y Apellidos</th>
                          <th>Materia</th>
                          <th>Sección</th>
                        </tr>
                      </thead>
                      <?php while ($reg = $result->fetch_array()){
                                      $num++;
                       ?>
                      <tbody>
                        <tr>
                          <td>
                            <div class="form-group form-check">
                               <label class="form-check-label">
                               <input name='id_estudiante[]' value="<?php echo $reg['id_estudiante'] ?>" class="form-check-input" type="checkbox">
                             </label>
                            </div>
                          </td>
                          <td><?php echo $reg['cedula_est'];?></td>
                          <td>

                          	<?php echo $reg['nombre_est'];?>
                          &nbsp;<?php echo $reg['apellido_est'];?>
                            
                          </td>
                          <td><?php echo $reg['materia'];?></td>
                          <td><?php echo $reg['seccion'];?>
                          <input type="hidden" name="id_profesor" value="<?php echo $reg['id_profesor'];?>" >
                          <input type="hidden" name="id_materia" value="<?php echo $reg['id_materia'];?>" >
                          <input type="hidden" name="seccion" value="<?php echo $reg['seccion'];?>" >



                        </td>
                          
                          
                        </tr>
                      </tbody>
                       <?php 
                              }
                       ?>
                    </table><hr>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          