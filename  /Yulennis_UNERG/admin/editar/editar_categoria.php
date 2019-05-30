
<?php
include("../../conexion.php");
$id_categoria = $_GET['id_categoria'];
$categoria = strtoupper($_GET['categoria']);


$sql = ("update categorias set  categoria='$categoria' where id_categoria = '$id_categoria'");

if (mysqli_query($mysqli, $sql)) {


    echo "<meta http-equiv='refresh' content='0;url=../consulta_categoria.php?pagina=1?update'>";
    }else {
             echo "ERROR: No se ejecuto $sql";
   }

        
   

       
     ?>






