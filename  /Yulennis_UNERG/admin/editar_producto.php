<?php 
include('../conexion.php');
include('menu.php'); 
?>

<?php 
$id_producto = $_GET['id_producto'];
$sql = ("SELECT  * FROM productos 
                                  INNER JOIN categorias ON productos.id_categoria = categorias.id_categoria
                                  WHERE productos.id_producto = '$id_producto'");

$result=$mysqli->query($sql);
$num = $result->num_rows;
if ($num > 0){

$row = $result->fetch_assoc();

?>


  <!--FORMULARIO DE REGISTRO DE CARRERA-->
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h3 align="center">Modificar Producto</h3><hr>
                  <form class="form-sample" action="editar/editar_producto.php" method="GET">
                    <p class="card-description">
                      <?php include('../alert.php'); ?>
                    </p>
                     <div class="row">
                      <div class="col-md-6">

                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Categoría</label>
                          <div class="col-sm-9">
                            <?php
                                $sql=("SELECT * FROM categorias");
                                  $result = $mysqli->query($sql);
                                  $consulta= $result->num_rows; 
                           ?>

                              <select name="id_categoria" class="form-control" onchange="pedirDatos()" required >
                                 <option value='<?php echo $row['id_categoria']; ?>'><?php echo $row['categoria']; ?></option>
                              <?php while ($reg = $result->fetch_array()){
                                      $num++;
                                      
                                      echo "<option value=\"".$reg['id_categoria']."\">".$reg['categoria']." </option> \n";
                                      
                                }
                            ?>
                             </select> 
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Codigo</label>
                          <div class="col-sm-9">

                            <input type="hidden" class="form-control" name="id_producto"  value="<?php echo $row['id_producto']; ?>" required/>


                            <input type="text" value="<?php echo $row['codigo_producto']; ?>" name="codigo_producto" class="form-control" disabled required/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Marca</label>
                          <div class="col-sm-9">
                            <input type="text" value="<?php echo $row['marca']; ?>" name="marca" class="form-control" required />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Nombre del Producto ó Equipo</label>
                          <div class="col-sm-9">
                            <input type="text" value="<?php echo $row['nombre_equipo']; ?>" name="nombre_equipo" class="form-control" required/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Cantidad</label>
                          <div class="col-sm-9">
                            <input type="number" value="<?php echo $row['cantidad']; ?>" name="cantidad" class="form-control" required />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Estado</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="estado" required>
                              <option value="<?php echo $row['estado']; ?>"><?php echo $row['estado']; ?></option>
                              <option value="bueno">Bueno</option>
                              <option value="regular">Regular</option>
                              <option value="dañado">Dañado</option>
                              <option value="en reparacion">En Reparación</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Ubicación</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="ubicacion"  value="<?php echo $row['ubicacion']; ?>" required/>
                           </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Detalles</label>
                          <div class="col-sm-9">
                            <textarea class="form-control" name="detalle" rows="7" required><?php echo $row['detalle']; ?></textarea>
                          </div>
                        </div>
                      </div>
                         <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Sede de la Unerg</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="sede" required>
                              <option value="<?php echo $row['sede']; ?>"><?php echo $row['sede']; ?></option>
                              <option value="San Juan de los Morros">San Juan de los Morros</option>
                              <option value="Ortiz">Ortiz</option>
                              <option value="Mellado">Mellado</option>
                              <option value="Calabozo">Calabozo</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-success"><i class="mdi mdi-check"></i> Modificar</button>

                    <a href="consulta_producto.php?pagina=1"><button type="button" class="btn"><i class="mdi mdi-close-box-outline"></i> Regresar</button></a>
                  </form>
                          <?php
                        }else{
                          echo "<script> alert('Datos no encontrados')</script>";
                          echo "<meta http-equiv='refresh' content='0;url=consulta_producto.php?pagina=1'>";
                        } 
                        ?>
                </div>
              </div>
            </div>
          </div>

<!--FIN DEL FORMULARIO DE REGISTRO DE CARRERA-->

      

    <!--Cerrando los Div q no cerre en el archivo menu-->
<?php include('../footer.php'); ?>