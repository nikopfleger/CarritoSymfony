<?php
namespace Carrito\Bundle\Entity2;
//include "articulos.php";

class ArticuloDAO{

	private $listadoArticulos;
	private $articulosXPagina;

	public function __construct(){

		$art1= new Articulo(1,"Galletitas",22,10);
		$art2= new Articulo(2,"Pan",10,20);
		$art3= new Articulo(3,"DVDVirgen",5,100);
		$art4= new Articulo(4,"Lapicera",2,50);
		$art5= new Articulo(5,"Cuaderno",10,90);
		$art6= new Articulo(6,"Chicle",1,500);
		$art7= new Articulo(7,"Marlboro Box", 30, 1000);
		$art8= new Articulo(8,"Queso",22,10);
		$art9= new Articulo(9,"Jamon",10,20);
		$art10= new Articulo(10,"Lechuga",22,10);
		$this->articulosXPagina = 3;
		$this->listadoArticulos= array($art1,$art2,$art3,$art4,$art5,$art6,$art7,$art8,$art9,$art10);

	}
	
	public function getarticulosXPagina()
	{
		return $this->articulosXPagina;
	}
	
	public function getlistadoArticulos()
	{
		return $this->listadoArticulos;
	}

	public function articulosToJson() {
		$array = array();
		foreach($this->listadoArticulos as $articulo)
			array_push($array,$articulo->toJson());
		return array_values($array);
	}

	public function actualizarDAO($articulo) {
		if ($articulo->__get("id") == "")
		{
			$id = $this->getNextArt();
			$articulo->__set("id", $id);
			array_push($this->listadoArticulos,$articulo);
			return array("id" => $id,"newID" => true);
		}
		else
		{
			$this->getArticuloByID($articulo->__get("id"))->__set("nombre",$articulo->__get("nombre"));
			$this->getArticuloByID($articulo->__get("id"))->__set("precioUnitario",$articulo->__get("precioUnitario")) ;
			$this->getArticuloByID($articulo->__get("id"))->__set("cantidad",$articulo->__get("cantidad"));
			return array("id" => $articulo->__get("id"),"newID" => false);
		}

	}

// 	public function getArticulos(){
// 		return $this->listadoArticulos;
// 	}

	public function getArticuloByID($id){
		foreach($this->listadoArticulos as $articulo){
			if($articulo->__get("id") == $id)
				return $articulo;
		}
	}

	public function eliminarByID($id) {

		$i=0;
		foreach ($this->listadoArticulos as $articulo)
		{
			if ($articulo->__get("id") == $id)
			{
				array_splice($this->listadoArticulos,$i,1);
				break;
			}
			$i++;
		}
	}

	public function getNextArt() {
		$array = array();
		foreach ($this->listadoArticulos as $articulo)
			array_push($array,$articulo->__get("id"));
		return max($array) + 1;
	}

	public function obtenerArrayArticulos($nroPagina) {
		$indiceInicial = $this->articulosXPagina * ($nroPagina - 1);
		$array = array();
		$i=0;
		foreach ($this->listadoArticulos as $articulo) {
			if (($i >= $indiceInicial) && ($i < $indiceInicial + $this->articulosXPagina))
				$array[$i - $indiceInicial] = array("nombre" => $articulo->__get("nombre"),"precioUnitario" => $articulo->__get("precioUnitario"),"id" => $articulo->__get("id"));
			else if ($i >= $indiceInicial + $this->articulosXPagina)
				break;
			$i++;				
		}
		return array("articulos" => $array);
	}

	public function numeroPaginas() {
		return ceil((float) (sizeof($this->listadoArticulos) / ($this->articulosXPagina)));
	}

	public function __get($value){
		return $this->$value;
	}

	public function __set($param,$value){
		$this->$param = $value;
	}

}