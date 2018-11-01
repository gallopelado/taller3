<?php

class Familia {

  private $op;
  private $id;
  private $nombre;
  private $idcalle;
  private $idciudad;
  private $codpostal;
  private $telefono;
  private $idorigen;

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

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getIdcalle(){
		return $this->idcalle;
	}

	public function setIdcalle($idcalle){
		$this->idcalle = $idcalle;
	}

	public function getIdciudad(){
		return $this->idciudad;
	}

	public function setIdciudad($idciudad){
		$this->idciudad = $idciudad;
	}

	public function getCodpostal(){
		return $this->codpostal;
	}

	public function setCodpostal($codpostal){
		$this->codpostal = $codpostal;
	}

	public function getTelefono(){
		return $this->telefono;
	}

	public function setTelefono($telefono){
		$this->telefono = $telefono;
	}

	public function getIdorigen(){
		return $this->idorigen;
	}

	public function setIdorigen($idorigen){
		$this->idorigen = $idorigen;
	}

}

?>
