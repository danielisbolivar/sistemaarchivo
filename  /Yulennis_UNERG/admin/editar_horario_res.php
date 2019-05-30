<?php 

include('../conexion.php');
include('menu.php');

$id_prof_materia = $_GET['id_prof_materia'];


$sql = ("SELECT  * FROM prof_materias
                                  INNER JOIN responsables ON responsables.id_responsable = prof_materias.id_responsable
                                  WHERE prof_materias.id_prof_materia = '$id_prof_materia'");

$result=$mysqli->query($sql);
$num = $result->num_rows;
if ($num > 0){

$row = $result->fetch_assoc();


?>
<script>
    function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
</script>
<script>
    function soloNumeros(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " 1234567890";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
</script>


<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4>Modificar datos del Responsable de Laboratorio</h4><hr>
                      <p class="card-description">
                        <?php include('../alert.php'); ?>
                        Datos encontrados
                      </p><hr>
                      <form class="forms-sample" action="editar/editar_horario_res.php" method="GET">
                        <input type="hidden" name="id_prof_materia" value="<?php echo $row['id_prof_materia']; ?>">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Eligue un Responsable</label>
                          
                           <?php
                                $sql=("SELECT * FROM responsables ORDER BY  nombre_res ASC");
                                  $result = $mysqli->query($sql);
                                  $consulta= $result->num_rows; 
                           ?>

                              <select name="id_responsable" class="form-control" onchange="pedirDatos()" required >
                                 <option value="<?php echo $row['id_responsable']; ?>"><?php echo $row['cedula_res']; ?>&nbsp;<?php echo $row['nombre_res']; ?>&nbsp;<?php echo $row['apellido_res']; ?></option>
                              <?php while ($reg = $result->fetch_array()){
                                      $num++;
                                      
                                      echo "<option value=\"".$reg['id_responsable']."\">".$reg['cedula_res']." ".$reg['nombre_res']." ".$reg['apellido_res']."</option> \n";
                                      
                                }
                            ?>
                             </select> 
                               
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
                          <input type="text" value="<?php echo $row['aula_lab']; ?>" maxlength="1" onkeypress="return soloNumeros(event)" name="aula_lab"  class="form-control" id="exampleInputPassword1" >
                        </div>

                        <button type="submit" class="btn btn-success mr-2">Modificar</button>
                        <a href="consulta_horario_res.php?pagina=1"><button type="button" class="btn btn-light">Regresar</button></a>
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
   <?php include('../footer.php'); ?>