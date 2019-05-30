<?php 

include('../conex.php');

$nombre_backup = date("Y-m-d_H:i:s") . "-informatica_unerg.sql";

header("Content-type: application/savingfile");
header("Content-Disposition: attachment; filename=$nombre_backup");
header("Content-Description: Document.");

$tablas = mysql_list_tables('informatica_unerg');
if (!$tablas) {
    echo "Error en la base de datos: no se pueden listar las tablas \n";
    echo 'MySQL Error: ' . mysql_error();
    exit();
}

echo "SET FOREIGN_KEY_CHECKS=0;\n\n";

while ($tabla = mysql_fetch_row($tablas)) {

    $creacion = mysql_fetch_array(mysql_query("SHOW CREATE TABLE $tabla[0]"));

    echo $creacion['Create Table']."\n\n";

    $columnas_txt = "";
    $columnas = mysql_query("SHOW COLUMNS FROM $tabla[0]");
    $cantidad_columnas = mysql_num_rows($columnas);
    if (mysql_num_rows($columnas) > 0) {
        while ($columna = mysql_fetch_assoc($columnas)) {
            $columnas_txt .= $columna['Field'] . ", ";
        }
    }

    $columnas = substr($columnas_txt, 0, -2);

    $registros = mysql_query("SELECT * FROM $tabla[0]");
    if($r = mysql_num_rows($registros) > 0){

      echo ";\nINSERT INTO $tabla[0] ($columnas) VALUES\n";

      $registros_txt = "";

      while ($registro = mysql_fetch_array($registros)) {
          $i = 0;
          $registro_txt = "";
          while ($i < $cantidad_columnas) {
              $registro_txt .= "'$registro[$i]', ";
              $i++;
          }
          $registros_txt .= "(".substr($registro_txt, 0, -2)."),\n";
      }

      echo substr($registros_txt, 0, -2).";\n\n\n";
      
  }else{
       echo ";\n";
  }

}

echo "SET FOREIGN_KEY_CHECKS=1;";


 ?>