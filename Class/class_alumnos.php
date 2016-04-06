<?php
class Consultar_Salones{
	private $consulta;
	private $fetch;
	
	function __construct($codigo){
		$this->consulta = mysql_query("SELECT * FROM salones WHERE id='$codigo'");
		$this->fetch = mysql_fetch_array($this->consulta);
	}
	
	function consultar($campo){
		return $this->fetch[$campo];
	}
}
class Consultar_Alumnos{
	
	private $consulta;
	private $fetch;
	
	function __construct($codigo){
		$this->consulta = mysql_query("SELECT * FROM alumnos WHERE id=$codigo or nit='$codigo' or nombre='$codigo' or apellido='$codigo'");
		$this->fetch = mysql_fetch_array($this->consulta);
	}
	
	function consultar($campo){
		return $this->fetch[$campo];
	}
}

class Proceso_Salones{
	var $nombre;	var $curso;	var $id;
	
	function __construct($nombre, $curso, $id){
		$this->nombre = $nombre; 		$this->curso = $curso;		$this->id = $id;
	}
	
	function crear(){
		$nombre=$this->nombre;	$curso=$this->curso;
		mysql_query("INSERT INTO salones (nombre, curso, estado) VALUES ('$nombre','$curso','s')");
	}
	
	function actualizar(){
		$nombre=$this->nombre;	$curso=$this->curso;	$id=$this->id;
		mysql_query("Update salones Set	nombre='$nombre', curso='$curso' Where id=$id");
	}
	
	
}

class Proceso_Alumnos{
	var $nombre;		var $telefono;		var $curso;		
	var $apellido;		var $fechan;		var $id;
	var $nit;			var $folio;			var $estado;
		
	function __construct($nombre, $apellido, $nit, $telefono, $fechan, $folio, $curso, $estado, $id){
		$this->nombre = $nombre;			$this->curso = $curso;		
		$this->apellido = $apellido;		$this->folio = $folio;
		$this->nit = $nit;					$this->estado = $estado;		
		$this->telefono = $telefono;		$this->id = $id;
		$this->fechan = $fechan;			
							
	}
		
	function crear(){
		$nombre=$this->nombre;			$curso=$this->curso;		
		$apellido=$this->apellido;		$estado=$this->estado;
		$nit=$this->nit;				$id=$this->id;
		$telefono=$this->telefono;		$folio=$this->folio;
		$fechan=$this->fechan;			
			
		mysql_query("INSERT INTO alumnos (nombre, apellido, nit, telefono, fechan, folio, curso, estado) VALUES ('$nombre','$apellido','$nit','$telefono','$fechan','$folio','$curso','$estado')");
	}
	
	function actualizar(){
		$nombre=$this->nombre;			$curso=$this->curso;
		$apellido=$this->apellido;		$estado=$this->estado;
		$nit=$this->nit;				$id=$this->id;
		$telefono=$this->telefono;		$folio=$this->folio;
		$fechan=$this->fechan;			
		
		mysql_query("Update alumnos Set	nombre='$nombre',
										apellido='$apellido',
										nit='$nit',
										telefono='$telefono',
										fechan='$fechan',
										folio='$folio',
										curso='$curso'
								Where id=$id");
	}	
	
}
?>