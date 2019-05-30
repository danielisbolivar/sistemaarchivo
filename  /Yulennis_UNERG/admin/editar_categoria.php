<?php 
include('../conexion.php');
include('menu.php'); 
?>

<?php 
$id_categoria = $_GET['id_categoria'];
$sql = ("SELECT   * FROM categorias 
								  WHERE id_categoria = $id_categoria");


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
                      <h4>Modificar Categorias</h4><hr>
                      <p class="card-description">
                        Datos encontrados
                      </p><hr>
                      <form class="forms-sample" action="editar/editar_categoria.php" method="GET">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Categoria</label>
                          <input type="hidden"  name="id_categoria" value="<?php echo $row['id_categoria']; ?>" />
                          <input type="text" name="categoria" class="form-control" value="<?php echo $row['categoria']; ?>" id="exampleInputEmail1" >
                        </div>
                        
                        <button type="submit" class="btn btn-success mr-2">Modificar</button>
                        <a href="consulta_categoria.php?pagina=1"><button type="button" class="btn btn-light">Regresar</button></a>
                      </form>
                              <?php
                        }else{
                          echo "<script> alert('Datos no encontrados')</script>";
                          echo "<meta http-equiv='refresh' content='0;url=consulta_categoria.php?pagina=1'>";
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