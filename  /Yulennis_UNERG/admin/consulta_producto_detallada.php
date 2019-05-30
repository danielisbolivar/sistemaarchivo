<?php 
  include('menu.php');
  include('../conexion.php');
?>

<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">

                  <!--Mensajes-->
                   <?php include('../alert.php'); ?>
                  <!--Fin de Mensajes-->

                   <div class="jumbotron text-center">
                    <h1>Inventario</h1>
                    <p>Realiza tu consulta de forma detallada</p>
                  </div>

                  <div class="container">
                    <div class="row">
                      <div class="col-sm-4">
                        <h5>Sede - Estado - Categoria</h5>
                        <hr style="height:1px;color:#15c043;background-color:#15c043;" />
                          
                          <form class="form-control" method="GET" action="buscar_equipo.php">
                          <label>Sede de la Unerg</label>
                            <select class="form-control" name="sede" required>
                              <option value="">Seleccione una Sede</option>
                              <option value="San Juan de los Morros">San Juan de los Morros</option>
                              <option value="Ortiz">Ortiz</option>
                              <option value="Mellado">Mellado</option>
                              <option value="Calabozo">Calabozo</option>
                            </select><br>

                            <label>Estado del Equipo</label>
                            <select class="form-control" name="estado" required>
                              <option value="">Seleccione...</option>
                              <option value="bueno">Bueno</option>
                              <option value="regular">Regular</option>
                              <option value="dañado">Dañado</option>
                              <option value="en reparacion">En Reparación</option>
                            </select><br>

                            <label>Categoría</label>
                            <?php
                                $sql=("SELECT * FROM categorias");
                                  $result = $mysqli->query($sql);
                                  $consulta= $result->num_rows; 
                           ?>

                              <select name="id_categoria" class="form-control" onchange="pedirDatos()" required>
                                 <option value=''>Seleccione una Categoría</option>
                              <?php while ($reg = $result->fetch_array()){
                                      $num++;
                                      
                                      echo "<option value=\"".$reg['id_categoria']."\">".$reg['categoria']." </option> \n";
                                      
                                }
                            ?>
                             </select><br>

                            <button type="sutmit" class="btn btn-inverse-success">Buscar</button> 
                           </form>


                      </div>
                      <div class="col-sm-4">
                        <h5>Buscar por Sede - Estado</h5>
                        <hr style="height:1px;color:#096dd3 ;background-color:#096dd3;" />

                        <form class="form-control" method="GET" action="buscar_equipo1.php">
                          <label>Sede de la Unerg</label>
                            <select class="form-control" name="sede" required>
                              <option value="">Seleccione una Sede</option>
                              <option value="San Juan de los Morros">San Juan de los Morros</option>
                              <option value="Ortiz">Ortiz</option>
                              <option value="Mellado">Mellado</option>
                              <option value="Calabozo">Calabozo</option>
                            </select><br>

                            <label>Estado del Equipo</label>
                            <select class="form-control" name="estado" required>
                              <option value="">Seleccione...</option>
                              <option value="bueno">Bueno</option>
                              <option value="regular">Regular</option>
                              <option value="dañado">Dañado</option>
                              <option value="en reparacion">En Reparación</option>
                            </select><br>

                            <button type="sutmit" class="btn btn-inverse-success">Buscar</button> 
                           </form>

                      </div>
                      <div class="col-sm-4">
                        <h5>Buscar solo por Sede</h5>
                        <hr style="height:1px;color:#dbcf14 ;background-color:#dbcf14;" />
                        
                         <form class="form-control" method="GET" action="buscar_equipo2.php">
                          <label>Sede de la Unerg</label>
                            <select class="form-control" name="sede" required>
                              <option value="">Seleccione una Sede</option>
                              <option value="San Juan de los Morros">San Juan de los Morros</option>
                              <option value="Ortiz">Ortiz</option>
                              <option value="Mellado">Mellado</option>
                              <option value="Calabozo">Calabozo</option>
                            </select><br>

                            <button type="sutmit" class="btn btn-inverse-success">Buscar</button> 
                           </form>

                      </div>

                    </div>
                  </div> 
                  
                </div>
              </div>
            </div>
           

<?php include('../footer.php'); ?>

