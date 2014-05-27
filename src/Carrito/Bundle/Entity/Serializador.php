<?php
namespace Carrito\Bundle\Entity;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;

class Serializador {

	public function serializame($obj,$tipo,$camposIgnorados=array()){


		$normalizer = new GetSetMethodNormalizer();
		//$normalizer->setIgnoredAttributes($this->getColumnasIgnoradas());
		$encoder = new JsonEncoder();


		$normalizer->setIgnoredAttributes($camposIgnorados);

		$serializer = new Serializer(array($normalizer), array($encoder));
		return	$serializer->serialize($obj, $tipo);

	}

	public function toJson($obj,$camposIgnorados=array()){
		return $this->serializame($obj, 'json',$camposIgnorados);
	}

	public function toArray($obj,$camposIgnorados=array()){

		$normalizer = new GetSetMethodNormalizer();
		$normalizer->setIgnoredAttributes($camposIgnorados);

		return $normalizer->normalize($obj);

	}

}
