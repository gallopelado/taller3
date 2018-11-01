<?php

class Barrio {
  private $op;
  private $id;
  private $descripcion;
  private $idciudad;
  private $descriciudad;

  public function getOp(){
		return $this->op;
	}

	public function setOp($op){
		$this->op = $op;
	}

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getDescripcion(){
		return $this->descripcion;
	}

	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}

	public function getIdCiudad(){
		return $this->idciudad;
	}

	public function setIdCiudad($idciudad){
		$this->idciudad = $idciudad;
	}

	public function getDescriCiudad(){
		return $this->descriciudad;
	}

	public function setDescriCiudad($descriciudad){
		$this->descriciudad = $descriciudad;
	}
}

?>
