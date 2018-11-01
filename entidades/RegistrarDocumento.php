<?php

class RegistrarDocumento {
  private $op;
  private $id;
  private $idpersona;
  private $idtipodocumento;
  private $archivo;
  private $observacion;

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

	public function getIdpersona(){
		return $this->idpersona;
	}

	public function setIdpersona($idpersona){
		$this->idpersona = $idpersona;
	}

	public function getIdtipodocumento(){
		return $this->idtipodocumento;
	}

	public function setIdtipodocumento($idtipodocumento){
		$this->idtipodocumento = $idtipodocumento;
	}

	public function getArchivo(){
		return $this->archivo;
	}

	public function setArchivo($archivo){
		$this->archivo = $archivo;
	}

	public function getObservacion(){
		return $this->observacion;
	}

	public function setObservacion($observacion){
		$this->observacion = $observacion;
	}

}
