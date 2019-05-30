<?php
	require ('conexion.php');
	
	$query = "SELECT id_carrera, carrera FROM carrera ORDER BY carrera";
	$resultado=$mysqli->query($query);
?>

<html>
	<head>
		<title>ComboBox Ajax, PHP y MySQL</title>
		
		<script language="javascript" src="js/jquery-3.1.1.min.js"></script>
		
		<script language="javascript">
			$(document).ready(function(){
				$("#cbx_estado").change(function () {

					$('#cbx_localidad').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
					
					$("#cbx_estado option:selected").each(function () {
						id_carrera = $(this).val();
						$.post("includes/getMunicipio.php", { id_carrera: id_carrera }, function(data){
							$("#cbx_municipio").html(data);
						});            
					});
				})
			});
			
			$(document).ready(function(){
				$("#cbx_municipio").change(function () {
					$("#cbx_municipio option:selected").each(function () {
						id_semestre = $(this).val();
						$.post("includes/getLocalidad.php", { id_semestre: id_semestre }, function(data){
							$("#cbx_localidad").html(data);
						});            
					});
				})
			});
		</script>
		
	</head>
	
	<body>
		<form id="combo" name="combo" action="guarda.php" method="POST">
			<div>Selecciona Carrera : <select name="cbx_estado" id="cbx_estado">
				<option value="0">Seleccionar Estado</option>
				<?php while($row = $resultado->fetch_assoc()) { ?>
					<option value="<?php echo $row['id_carrera']; ?>"><?php echo $row['carrera']; ?></option>
				<?php } ?>
			</select></div>
			
			<br />
			
			<div>Selecciona Semestre : <select name="cbx_municipio" id="cbx_municipio"></select></div>
			
			<br />
			
			<div>Selecciona Materia : <select name="cbx_localidad" id="cbx_localidad"></select></div>
			
			<br />
			<input type="submit" id="enviar" name="enviar" value="Guardar" />
		</form>
	</body>
</html>
