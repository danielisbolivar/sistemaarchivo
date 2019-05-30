<?php

$link = mysql_connect("localhost","admin","admin");
if(!mysql_select_db("informatica_unerg",$link))
{
echo "no esta con la base de datos conectado por favor verifique";

}

?>
