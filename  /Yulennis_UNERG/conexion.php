<?php
$mysqli = new mysqli("localhost", "admin", "admin", "informatica_unerg");
if ($mysqli->connect_errno) {
	echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ")" . $mysqli->connect_errno;
}
?>