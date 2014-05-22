<?php
namespace Carrito\Bundle\Entity2;

class Articulo {
	
	private $id;
	private $nombre;
	private $precioUnitario;
	private $cantidad;
	
	public function getid() {
		return $this->id;
	}
	
	public function getnombre() {
		return $this->nombre;
	}
	public function getprecioUnitario() {
		return $this->precioUnitario;
	}
	public function getcantidad() {
		return $this->cantidad;
	}
	
	public function __construct($id,$nombreArticulo,$precioUnitario,$cantidad){
		$this->id = $id;
		$this->nombre = $nombreArticulo;
		$this->precioUnitario = $precioUnitario;
		$this->cantidad = $cantidad;
	}

	public function __get($value){
		return $this->$value;
	}

	public function __set($param,$value){
		$this->$param = $value;
	}
	

	
	public function toJson() {
		return array(
				"id" => $this->id,
				"nombre" => $this->nombre,
				"precio" => $this->precioUnitario,
				"cantidad" => $this->cantidad
		);
	
	}
	

	
}


?>