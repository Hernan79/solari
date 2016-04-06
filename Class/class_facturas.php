<?php

class Consultar_Facturas{
	
	private $consulta;
	private $fetch;
	
	function __construct($codigo){
		$this->consulta = mysql_query("SELECT * FROM reg_facturas WHERE factura='$codigo' or vendedor='$codigo' or zona='$codigo' or pedidos='$codigo'");
		$this->fetch = mysql_fetch_array($this->consulta);
	}
	
	function consultar($campo){
		return $this->fetch[$campo];
	}
}

class Proceso_Factura{
	var $fecha_sist;		var $pedidos;		var $vendedor;		
	var $factura;			var $codigo;		var $bultos;
	var $ne;				var $cliente;		var $base_imponible;
	var $fecha_real;		var $zona;			var $estado;
	var $id;
		
	function __construct($id, $fecha_sist, $factura, $ne, $pedidos, $codigo, $cliente, $vendedor, $bultos, $base_imponible, $fecha_real, $zona, $estado){
		$this->fecha_sist = $fecha_sist;	$this->codigo = $codigo;		
		$this->factura = $factura;			$this->cliente = $cliente;
		$this->ne = $ne;					$this->zona = $zona;		
		$this->fecha_real = $fecha_real;	$this->vendedor = $vendedor;
		$this->pedidos = $pedidos;			$this->bultos = $bultos;
		$this->id = $id;									$this->base_imponible = $base_imponible;
											$this->estado = $estado;
												
											
	}
		
	function crear(){
		$fecha_sist=$this->fecha_sist;		 $codigo= $this->codigo;		
		$factura=$this->factura;			 $cliente= $this->cliente;
		$ne= $this->ne;						 $zona= $this->zona;		
		$fecha_real= $this->fecha_real;	 	 $vendedor= $this->vendedor;
		$pedidos= $this->pedidos;			 $bultos= $this->bultos;
		$id= $this->id;						 $base_imponible= $this->base_imponible;
											 $estado=$this->estado;
											 	
			
		mysql_query("INSERT INTO reg_facturas (id, fecha_sist, factura, ne, pedidos, codigo, cliente, vendedor, bultos, base_imponible, fecha_real, zona, estado) VALUES ('$id', '$fecha_sist', '$factura', '$ne', '$pedidos', '$codigo', '$cliente', '$vendedor', '$bultos', '$base_imponible', '$fecha_real', '$zona', '$estado')");
	}
	
	
}
?>