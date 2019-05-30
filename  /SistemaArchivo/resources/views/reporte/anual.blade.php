<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
	    table, th, td {
	      border: 1px solid black;
	      border-collapse: collapse;
	      font-size: 13px;
	    }
	</style>
</head>
<body>
	<p align="center">República Bolivariana de Venezuela</p>
	<p align="center">Universidad Nacional Experimental Rómulo Gallegos</p>
	<p align="center">San Juan de los Morros - Edo. Guárico</p><br><br>
	<h1 align="center">Listado Anual</h1>
<br><br><br><br>
	<table align="center">
		<thead>
			<tr>
				<th>
					Fecha de Retiro
				</th>
				<th>
					Carrera
				</th>
			</tr>
		</thead>
		@foreach($expedientes as $expediente)
			<tr>
				<td>
					{{ $expediente->fecha_ingreso }}
				</td>
				<td>
					{{ $expediente->nombre }}
				</td>
			</tr>
		@endforeach
	</table>
	<br><br>
	<p>Cantidad de retirados: {{ $expedientes->count() }}</p>
</body>
</html>