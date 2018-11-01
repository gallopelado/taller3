<?php

class Calle {
  private $op;
  private $id;
  private $descripcion;
  private $idbarrio;
  private $describarrio;

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

  public function getIdBarrio(){
		return $this->idbarrio;
	}

	public function setIdBarrio($idbarrio){
		$this->idbarrio = $idbarrio;
	}

  public function getDescriBarrio(){
		return $this->describarrio;
	}

	public function setDescriBarrio($describarrio){
		$this->describarrio = $describarrio;
	}
}

?>
