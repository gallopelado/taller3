<?php

class Ministerio {
  private $op;
  private $id;
  private $descripcion;

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
}

?>
