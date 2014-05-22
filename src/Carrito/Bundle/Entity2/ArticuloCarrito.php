<?php
namespace Carrito\Bundle\Entity2;
//include "articulos.php";
class ArticuloCarrito extends Articulo {
	private $idCompra;

	public function __construct($id,$nombreArticulo,$precioUnitario,$cantidad,$idCompra){
		$this->id = $id;
		$this->nombre = $nombreArticulo;
		$this->precioUnitario = $precioUnitario;
		$this->cantidad = $cantidad;
		$this->idCompra = $idCompra;
	}
	public function toJason($nuevoTotal) {
		return array(
				"id" => $this->idCompra,
				"nombre" => $this->nombre,
				"precio" => $this->precioUnitario,
				"cantidad" => $this->cantidad,
				"total" => $nuevoTotal
		);
	}

	public function __get($value){
		return $this->$value;
	}

	public function __set($param,$value){
		$this->$param = $value;
	}

}