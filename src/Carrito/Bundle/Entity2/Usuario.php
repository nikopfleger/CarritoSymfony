<?php
namespace Carrito\Bundle\Entity2;

class Usuario {
	
	private $nombre;
	private $pass;
	
	public function __get($value){
		return $this->$value;
	}
	
	public function __set($param,$value){
		$this->$param = $value;
	}
	
	public function equals($usuario){
		return (($usuario->__get("nombre") == $this->__get("nombre")) && ($usuario->__get("pass") == $this->__get("pass")));
	}
	
	public function __construct($nom,$contra){
		$this->nombre = $nom;
		$this->pass = $contra;		
	}
	
	public function toJason() {
		return array("nombre" => $this->nombre,"pass" => $this->pass);
	}
	
}






?>