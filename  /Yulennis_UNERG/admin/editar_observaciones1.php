<?php 
include('../conexion.php');
include('menu.php'); 
?>

<?php 
$id_observaciones = $_GET['id_observaciones'];
$sql = ("SELECT   * FROM observaciones
                        INNER JOIN responsables ON responsables.id_responsable = 
                        observaciones.id_responsable
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
                      <form action="editar/editar_observaciones1.php" method="GET">
                        <label>Responsable</label>
                        <?php
                                              $sql=("SELECT * FROM responsables ORDER BY  id_responsable DESC");
                                                $result = $mysqli->query($sql);
                                                $consulta= $result->num_rows; 
                                         ?>

                                            <select name="id_responsable" class="form-control" onchange="pedirDatos()" required >
                                               <option value='<?php echo $row['id_responsable']; ?>'><?php echo $row['cedula_res']; ?> <?php echo $row['nombre_res']; ?> <?php echo $row['apellido_res']; ?></option>
                                            <?php while ($reg = $result->fetch_array()){
                                                    $num++;
                                                    
                                                    echo "<option value=\"".$reg['id_responsable']."\">".$reg['cedula_res']." ".$reg['nombre_res']." ".$reg['apellido_res']."</option> \n";
                                                    
                                              }
                                          ?>
                                           </select> <br>
                                         
                        <label>Observaciones</label>
                        <input type="hidden" name="id_observaciones" value='<?php echo $row['id_observaciones']; ?>' >
                        <textarea name="observaciones" value='<?php echo $row['observaciones']; ?>' minlength="20" maxlength="500" rows="15" required="" class="form-control"><?php echo $row['observaciones']; ?></textarea>
                        <br>
                        <button type="submit" class="btn btn-success">Modificar</button>
                        <a href="consulta_observaciones1.php?pagina=1">
                        <button type="button" class="btn">Regresar</button></a>
                      </form>
                              <?php
                        }else{
                          echo "<script> alert('Datos no encontrados')</script>";
                          echo "<meta http-equiv='refresh' content='0;url=consulta_observaciones1.php?pagina=1'>";
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