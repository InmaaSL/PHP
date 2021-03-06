<?php
 
class Model 
{
	protected $conexion;
	
	//Esta función sólo conecta con la BD y se llama automáticamente al crear el objeto Model
	public function __construct($dbhost, $dbuser, $dbpass, $dbname) 
	{ 
		$mvc_bd_conexion = new mysqli($dbhost, $dbuser, $dbpass, $dbname); 
		$error = $mvc_bd_conexion->connect_errno;
		if ($error != null) 
		{
			echo "<p>Error ".$error. "conectando a la base de datos: "; 
			echo $mvc_bd_conexion->connect_error."</p>"; 
			exit();
		} 
		$this->conexion = $mvc_bd_conexion; 
	}
	
	//Esta función recibe por parámetro una sentencia SELECT y devuelve un array de alimentos
	//El array será accesible tanto con posiciones numéricas como asociativas, al ser fetch_array
	private function devolverAlimentosSelect($sql) 
	{
		$consulta = $this->conexion->query($sql); 
		$alimentos = array(); 
		while($resultado = $consulta->fetch_array()) 
		{ 
			$alimentos[] = $resultado; 
		} 
		return $alimentos; 
	}
	
	//Esta función recibe por una sentencia que NO devuelve datos (insert, delete o update) y la ejecuta
	private function consultaQueNoDevuelveDatos($sql) 
	{ 
		return $this->conexion->query($sql); 
	}
	
	/*************************************/
	
	//Esta función obtiene todos los alimentos de la BD, para el apartado "ver alimentos"
	public function dameAlimentos() 
	{ 
		$sql = "SELECT * FROM alimentos"; 
		return $this->devolverAlimentosSelect($sql); 
	}
	
	//Esta función obtiene los alimentos que contienen la cadena recibida, para el apartado "buscar por nombre"
	public function buscarAlimentosPorNombre($nombre) 
	{
		$sql = "select * from alimentos where nombre like '%".$nombre."%'"; 
		return $this->devolverAlimentosSelect($sql); 
	}
	
	//Esta función obtiene el alimentos (sólo uno) cuya id es la id recibida, para cuando hacemos click sobre un alimento
	public function dameAlimento($id) 
	{ 
		$sql = "select * from alimentos where id=".$id; 
		return $this->devolverAlimentosSelect($sql)[0]; 
	}
	
	//Esta función obtiene los alimentos que contienen la cadena recibida, para el apartado "buscar por nombre"
	public function insertarAlimento($n, $e, $p, $hc, $f, $g) 
	{
		$sql = "INSERT INTO alimentos (nombre, energia, proteina, hidratocarbono, fibra, grasatotal)
				values ('" . $n . "'," . $e . "," . $p . "," . $hc . "," . $f . "," . $g . ")";  
		return $this->consultaQueNoDevuelveDatos($sql); 
	}
	
	/*************************************/
	//Esta es una pequeña función de validación que se ha usado para el formulario (podría mejorarse)
	public function validarDatos($n, $e, $p, $hc, $f, $g) 
	{
		return (is_string($n) & is_numeric($e) & is_numeric($p) & 
				is_numeric($hc) & is_numeric($f) & is_numeric($g)); 
	}
	public function validarDatosNombre($n) 
	{
		return (is_string($n)); 
    }
    
    /**************************************/
    //Esta función obtiene los alimentos que contienen la cadena recibida, para el apartado "buscar por energia"
	public function buscarAlimentosPorEnergia($energia) 
	{
		$sql = "select * from alimentos where energia like '%".$energia."%'"; 
		return $this->devolverAlimentosSelect($sql); 
	}

	/***************************************/
	//Estas funciones ordenarán las consultas según el nombre, la energía o la grasa: 
		//Esta función obtiene los alimentos que contienen la cadena recibida, para el apartado "buscar por nombre"
		public function buscarAlimentosOrdenadosPorNombre($nombre) 
		{
			$sql = "select * from alimentos order by nombre"; 
			return $this->devolverAlimentosSelect($sql); 

		}
		public function buscarAlimentosOrdenadosPorEnergia($energia) 
		{
			$sql = "select * from alimentos order by energia"; 
			return $this->devolverAlimentosSelect($sql); 
			
		}
		public function buscarAlimentosOrdenadosPorGrasa($grasa) 
		{
			$sql = "select * from alimentos order by grasatotal"; 
			return $this->devolverAlimentosSelect($sql); 
		}

	/***************************************/
	//Estas funciones ordenarán las consultas de forma ascendente o descendente: 
	//Esta función obtiene los alimentos que contienen la cadena recibida, para el apartado "buscar por nombre"

		public function buscarAlimentosOrdenadosAscNombre($nombre) 
		{
			$sql = "select * from alimentos order by nombre asc"; 
			return $this->devolverAlimentosSelect($sql); 
		}

		public function buscarAlimentosOrdenadosDescNombre($nombre) 
		{
			$sql = "select * from alimentos order by nombre desc"; 
			return $this->devolverAlimentosSelect($sql); 
		}

		public function buscarAlimentosOrdenadosAscGrasa($grasa) 
		{
			$sql = "select * from alimentos order by grasatotal asc"; 
			return $this->devolverAlimentosSelect($sql); 
		}

		public function buscarAlimentosOrdenadosDescGrasa($grasa) 
		{
			$sql = "select * from alimentos order by grasatotal desc"; 
			return $this->devolverAlimentosSelect($sql); 
		}

		public function buscarAlimentosOrdenadosAscEnergia($energia) 
		{
			$sql = "select * from alimentos order by energia asc"; 
			return $this->devolverAlimentosSelect($sql); 
		}

		public function buscarAlimentosOrdenadosDescEnergia($energia) 
		{
			$sql = "select * from alimentos order by energia desc"; 
			return $this->devolverAlimentosSelect($sql); 
		}

	/***************************************/
	//Estas funciones elimina el alimento seleccionado: 
	public function eliminarPorNombre($nombre) 
	{
		$sql = "DELETE FROM alimentos WHERE nombre = '$nombre'";  
		return $this->consultaQueNoDevuelveDatos($sql); 
	}
}

?>
