<?php

class Conectar
{
	public static function con()
	{
		$con=mysql_connect("localhost","admin","admin");
		mysql_query("SET NAMES 'utf8'");
		mysql_select_db("informatica_unerg");
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
	
	public function get_producto_1()
	{
		 $id_materia = $_GET['id_materia'];
         $seccion = $_GET['seccion'];
         $id = $_GET['id'];
		 $sql = ("SELECT   * FROM estudiantes 
                      	          INNER JOIN asig_estudiantes ON estudiantes.id_estudiante = asig_estudiantes.id_estudiante
                                  INNER JOIN materia ON materia.id_materia = asig_estudiantes.id_materia
                                  INNER JOIN prof_materias ON prof_materias.id_materia = asig_estudiantes.id_materia WHERE asig_estudiantes.id_profesor = '$id' AND asig_estudiantes.seccion = '$seccion' AND asig_estudiantes.id_materia = '$id_materia'");
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

	private $producto;
	
	public function __construct()
	{
		$this->producto=array();
	}
	
	public function get_producto_2()
	{
		$id = $_GET['id'];
        $fecha1 = $_GET['fecha1'];
        $fecha2 = $_GET['fecha2'];
		$sql = ("SELECT   * FROM asistencia_est 
                      	          INNER JOIN materia ON asistencia_est.id_materia = materia.id_materia
                                  INNER JOIN estudiantes ON estudiantes.id_estudiante = asistencia_est.id_estudiante
                                  INNER JOIN profesores ON profesores.id_profesor = asistencia_est.id_profesor 
                                  WHERE asistencia_est.id_profesor = '$id'
                                  AND asistencia_est.fecha_registro>='$fecha1' AND asistencia_est.fecha_registro<='$fecha2'");
		$res=mysql_query($sql,Conectar::con());	
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->producto[]=$reg;
		}
			return $this->producto;
	}
}

class Trabajo2
{

	private $producto;
	
	public function __construct()
	{
		$this->producto=array();
	}
	
	public function get_producto_3()
	{
		$sede = $_GET['sede'];
		echo $sede;
        $estado = $_GET['estado'];
		$sql = ("SELECT  * FROM productos 
                                  INNER JOIN categorias  
                                  WHERE productos.id_categoria = categorias.id_categoria AND productos.sede = '$sede' AND productos.estado = '$estado'
                                  Order by productos.id_producto");
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
	
	public function get_producto_4()
	{
		$sede = $_GET['sede'];
		
		$sql = ("SELECT  * FROM productos 
                                  INNER JOIN categorias  
                                  WHERE productos.id_categoria = categorias.id_categoria AND productos.sede = '$sede' 
                                  Order by productos.id_producto");
		$res=mysql_query($sql,Conectar::con());	
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->producto[]=$reg;
		}
			return $this->producto;
	}
}
class Trabajo4
{

	private $producto;
	
	public function __construct()
	{
		$this->producto=array();
	}
	
	public function get_profesor()
	{
		
		
		$sql = ("SELECT   * FROM profesores 
                      	          INNER JOIN telefono ON profesores.id_profesor = telefono.id_profesor
								  INNER JOIN email  ON profesores.id_profesor = 
								       email.id_profesor
								  INNER JOIN direccion  ON profesores.id_profesor = 
								  direccion.id_profesor 
								  Order by profesores.sede ASC" 
								  );
		
		$res=mysql_query($sql,Conectar::con());	
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->producto[]=$reg;
		}
			return $this->producto;
	}
}
class Trabajo5
{

	private $producto;
	
	public function __construct()
	{
		$this->producto=array();
	}
	
	public function get_profesor_1()
	{
		
		$sede = $_GET['sede'];
		$sql = ("SELECT   * FROM profesores 
                      	          INNER JOIN telefono ON profesores.id_profesor = telefono.id_profesor
								  INNER JOIN email  ON profesores.id_profesor = 
								       email.id_profesor
								  INNER JOIN direccion  ON profesores.id_profesor = 
								  direccion.id_profesor 
								  WHERE profesores.sede = '$sede'");
		
		$res=mysql_query($sql,Conectar::con());	
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->producto[]=$reg;
		}
			return $this->producto;
	}
}


?>