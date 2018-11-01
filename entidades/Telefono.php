<?php

class Telefono {

  private $op;
  private $id;
  private $tipo;
  private $telefono;
  private $persona;

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

	public function getTipo(){
		return $this->tipo;
	}

	public function setTipo($tipo){
		$this->tipo = $tipo;
	}

	public function getTelefono(){
		return $this->telefono;
	}

	public function setTelefono($telefono){
		$this->telefono = $telefono;
	}

	public function getPersona(){
		return $this->persona;
	}

	public function setPersona($persona){
		$this->persona = $persona;
	}

}

 ?>
