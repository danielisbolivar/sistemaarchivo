<?php 
include('menu.php');
include('../conexion.php');
?>

<?php
	if(!empty($_POST["guardar"])) {
		$contador = count($_POST["categoria"]);
		$ProContador=0;
		$query = "INSERT INTO categorias (categoria) VALUES ";
		$queryValue = "";
		for($i=0;$i<$contador;$i++) {
			if(!empty($_POST["categoria"][$i])) {
				$ProContador++;
				if($queryValue!="") {
					$queryValue .= ",";
				}
				$queryValue .= "('" . $_POST["categoria"][$i] . "')";
			}
		}
		$sql = $query.$queryValue;
		if($ProContador!=0) {
		    $resultadocon = mysqli_query($mysqli, $sql);
			if(!empty($resultadocon)) $resultado = " <br><ul class='list-group' style='margin-top:15px;'>
   <li class='list-group-item'>Registro(s) Agregado Correctamente.</li></ul>";
		}
	}
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<!-- Bootstrap core CSS -->
<link href="dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="assets/sticky-footer-navbar.css" rel="stylesheet">
<link href="assets/style.css" rel="stylesheet">
<script src="http://code.jquery.com/jquery-2.1.1.js"></SCRIPT>
<script>
function AgregarMas() {
	$("<div>").load("InputDinamico.php", function() {
			$("#productos").append($(this).html());
	});	
}
function BorrarRegistro() {
	$('div.lista-producto').each(function(index, item){
		jQuery(':checkbox', this).each(function () {
            if ($(this).is(':checked')) {
				$(item).remove();
            }
        });
	});
}
</script>

</head>

<body>


<!-- Begin page content -->

<div class="container">
  <h4 class="mt-5">Registrar Categorias para control de Equipos en Generales</h4>
  <hr>
  <div class="row">
    <div class="col-12 col-md-12"> 
      <!-- Contenido -->
      

<p><input class="btn btn-success" type="button" name="agregar_registros" value="Agregar" onClick="AgregarMas();" />
<input class="btn" type="button" name="borrar_registros" value="Borrar" onClick="BorrarRegistro();" /></p>

<FORM name="frmProduct" method="post" action="">
<div id="outer">
<div id="header">
<div class="float-left">&nbsp; Nro.</div>
<div class="float-left col-heading"> Categoría</div>
</div>
<div id="productos">
<?php require_once("InputDinamico.php") ?>
</div>
<div class="btn-action float-clear">
<span class="success"><?php if(isset($resultado)) { echo $resultado; }?></span>
</div>
<div style="position: relative;">
<input class="btn btn-primary" type="submit" name="guardar" value="Guardar" />
</div>
</div>
</form>


      <!-- Fin Contenido --> 
    </div>
  </div>
  <!-- Fin row --> 

  
</div>


<script src="dist/js/bootstrap.min.js"></script>
</body>
</html>