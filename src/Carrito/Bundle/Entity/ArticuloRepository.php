<?php

namespace Carrito\Bundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * ArticuloRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ArticuloRepository extends EntityRepository
{
	
	const ARTICULOS_X_PAGINA = 3;
	public function numeroPaginas()
	{
		$number = count($this->findall());
			return ceil($number / (float) ArticuloRepository::ARTICULOS_X_PAGINA);
	}
	
	public function obtenerPagina($nroPagina) 
	{
		$inicio = ArticuloRepository::ARTICULOS_X_PAGINA * ($nroPagina - 1);
		$all = $this->findall();
		$array = array();
		$i=0;
		foreach ($all as $articulo)
		{
			if (($i >= $inicio) && ($i < $inicio + ArticuloRepository::ARTICULOS_X_PAGINA))
				$array[$i - $inicio] = array("nombre" => $articulo->getNombre(),"precio" => $articulo->getPrecio(),"id" => $articulo->getId());
			
			else if ($i >= $inicio + ArticuloRepository::ARTICULOS_X_PAGINA)
				break;
			$i++;				
		}
		return array("articulos" => $array);
	}
}