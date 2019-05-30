<?php 
include('../conexion.php');
include('menu.php'); 
?>

<?php 
$id_materia = $_GET['id_materia'];
$sql = ("SELECT   * FROM materia 
								  WHERE id_materia = $id_materia");


$result=$mysqli->query($sql);
$num = $result->num_rows;
if ($num > 0){

$row = $result->fetch_assoc();

?>
<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-8 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4>Modificar Materia</h4><hr>
                      <p class="card-description">
                        Datos encontrador
                      </p><hr>
                      <form class="forms-sample" action="editar/editar_materia.php" method="GET">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Codigo de la Materia</label>
                          <input type="hidden"  name="id_materia" value="<?php echo $row['id_materia']; ?>" />
                          <input type="text" name="codigo" class="form-control" value="<?php echo $row['codigo']; ?>" id="exampleInputEmail1" >
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Nombre de la Materia</label>
                          <input type="text" name="materia" value="<?php echo $row['materia']; ?>" class="form-control" id="exampleInputPassword1" >
                        </div>
                        <button type="submit" class="btn btn-success mr-2">Modificar</button>
                        <a href="consulta_materia.php?pagina=1"><button type="button" class="btn btn-light">Regresar</button></a>
                      </form>
                              <?php
                        }else{
                          echo "<script> alert('Datos no encontrados')</script>";
                          echo "<meta http-equiv='refresh' content='0;url=consulta_materia.php?pagina=1'>";
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