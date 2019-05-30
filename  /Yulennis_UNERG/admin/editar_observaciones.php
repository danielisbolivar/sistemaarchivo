<?php 
include('../conexion.php');
include('menu.php'); 
?>

<?php 
$id_observaciones = $_GET['id_observaciones'];
$sql = ("SELECT   * FROM observaciones
                        INNER JOIN profesores ON profesores.id_profesor = 
                        observaciones.id_profesor
								  WHERE id_observaciones = $id_observaciones");


$result=$mysqli->query($sql);
$num = $result->num_rows;
if ($num > 0){

$row = $result->fetch_assoc();

?>
<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-9 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4>Modificar Observación</h4><hr>
                      <p class="card-description">
                        Datos encontrados
                      </p><hr>
                      <form action="editar/editar_observaciones.php" method="GET">
                        <label>Profesor</label>
                        <?php
                                              $sql=("SELECT * FROM profesores ORDER BY  id_profesor DESC");
                                                $result = $mysqli->query($sql);
                                                $consulta= $result->num_rows; 
                                         ?>

                                            <select name="id_profesor" class="form-control" onchange="pedirDatos()" required >
                                               <option value='<?php echo $row['id_profesor']; ?>'><?php echo $row['cedula_prof']; ?> <?php echo $row['nombre_prof']; ?> <?php echo $row['apellido_prof']; ?></option>
                                            <?php while ($reg = $result->fetch_array()){
                                                    $num++;
                                                    
                                                    echo "<option value=\"".$reg['id_profesor']."\">".$reg['cedula_prof']." ".$reg['nombre_prof']." ".$reg['apellido_prof']."</option> \n";
                                                    
                                              }
                                          ?>
                                           </select> <br>
                        <div class="form-group">
                                        <label for="exampleInputPassword1">Sección</label>
                                        <input type="text" value="<?php echo $row['seccion']; ?>" name="seccion"  class="form-control" maxlength="1" onkeypress="return soloNumeros(event)" id="exampleInputPassword1" >
                                      </div>
                        <label>Observaciones</label>
                        <input type="hidden" name="id_observaciones" value='<?php echo $row['id_observaciones']; ?>' >
                        <textarea name="observaciones" value='<?php echo $row['observaciones']; ?>' minlength="20" maxlength="500" rows="15" required="" class="form-control"><?php echo $row['observaciones']; ?></textarea>
                        <br>
                        <button type="submit" class="btn btn-success">Modificar</button>
                        <a href="consulta_observaciones.php?pagina=1">
                        <button type="button" class="btn">Regresar</button></a>
                      </form>
                              <?php
                        }else{
                          echo "<script> alert('Datos no encontrados')</script>";
                          echo "<meta http-equiv='refresh' content='0;url=consulta_observaciones.php?pagina=1'>";
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