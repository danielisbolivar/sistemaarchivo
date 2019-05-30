
<?php
include("../../conexion.php");
$id_producto = $_GET['id_producto'];
$id_categoria = strtoupper($_GET['id_categoria']);
$marca = strtoupper($_GET['marca']);
$nombre_equipo = strtoupper($_GET['nombre_equipo']);
$estado = strtoupper($_GET['estado']);
$detalle = strtoupper($_GET['detalle']);
$cantidad = strtoupper($_GET['cantidad']);
$ubicacion = strtoupper($_GET['ubicacion']);
$sede = strtoupper($_GET['sede']);


$sql = ("update productos set  id_categoria='$id_categoria', marca='$marca', nombre_equipo='$nombre_equipo', estado='$estado', detalle='$detalle', cantidad='$cantidad', ubicacion='$ubicacion', sede='$sede' where id_producto = '$id_producto'");

if (mysqli_query($mysqli, $sql)) {


    echo "<meta http-equiv='refresh' content='0;url=../consulta_producto.php?pagina=1?update'>";
    }else {
             echo "ERROR: No se ejecuto $sql";
   }


       
     ?>






