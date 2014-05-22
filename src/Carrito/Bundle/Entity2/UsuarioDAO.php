<?php
// include "usuario.php";
namespace Carrito\Bundle\Entity2;
class UsuarioDAO{
	private $arrUsers;

	public function __construct(){

		$userTom = new Usuario("nicolas","hola");
		$user2 = new Usuario("matias","hola");
		$this->arrUsers = array($userTom,$user2);
	}
	public function existeUsuario($usuario){
		foreach($this->arrUsers as $user){
			if($user->equals($usuario))
				return true;
		}
	}

}