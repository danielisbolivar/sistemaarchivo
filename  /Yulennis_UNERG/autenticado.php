<?php session_start();
if ($_SESSION["aut"]!="si") header('location: index.php');
?>