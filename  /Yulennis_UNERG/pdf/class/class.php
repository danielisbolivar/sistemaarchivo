<?php

class Conectar
{
	public static function con()
	{
		$con=mysql_connect("localhost","root","");
		mysql_query("SET NAMES 'utf8'");
		mysql_select_db("conmake");
		return $con;
	}
//**********************************************************************************************
//Función para invertir fecha
public static function invierte_fecha($fecha){
	$dia=substr($fecha,8,2);
	$mes=substr($fecha,5,2);
	$anio=substr($fecha,0,4);
	$correcta=$dia."-".$mes."-".$anio;
	return $correcta;
	}

}
class Trabajo 
{

	private $usuario;
	
	public function __construct()
	{
		$this->usuario=array();
	}
	
	public function get_usuario()
	{
		$sql = ("select * from administrador where tipo='1'");
		$res=mysql_query($sql,Conectar::con());	
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->usuario[]=$reg;
		}
			return $this->usuario;
	}
}
class Trabajo1 
{

	private $cliente;
	
	public function __construct()
	{
		$this->cliente=array();
	}
	
	public function get_cliente()
	{
		
		$sql = ("select * from cliente");
		$res=mysql_query($sql,Conectar::con());	
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->cliente[]=$reg;
		}
			return $this->cliente;
	}
}
class Trabajo2 
{

	private $producto;
	
	public function __construct()
	{
		$this->producto=array();
	}
	
	public function get_producto()
	{
		
		$sql = ("select * from producto where quedan > '0'");
		$res=mysql_query($sql,Conectar::con());	
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->producto[]=$reg;
		}
			return $this->producto;
	}
}

class Trabajo3
{

	private $producto;
	
	public function __construct()
	{
		$this->producto=array();
	}
	
	public function get_venta()
	{
		$date = date('Y-m-d');
		$sql = ("SELECT  t1. * , t2. *FROM producto t1
        INNER JOIN venta t2 ON t1.id_producto = t2.id_producto WHERE t2.estatus = 'pagado' AND t2.fecha_compra= '$date' ");
		$res=mysql_query($sql,Conectar::con());	
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->producto[]=$reg;
		}
			return $this->producto;
	}
}

?>