<?php

class HistoricoAfiliante {
  private $op;
  private $ant_idrequisito;
  private $idpersona;
  private $idrequisito;
  private $descri_persona;
  private $descri_requisito;
  private $estado;
  private $fechacompletado;
  private $modificable;

  public function getOp(){
		return $this->op;
	}

	public function setOp($op){
		$this->op = $op;
	}

  public function getAntIdRequisito(){
		return $this->ant_idrequisito;
	}

	public function setAntIdRequisito($ant_idrequisito){
		$this->ant_idrequisito = $ant_idrequisito;
	}

  public function getIdpersona(){
		return $this->idpersona;
	}

	public function setIdpersona($idpersona){
		$this->idpersona = $idpersona;
	}

	public function getIdrequisito(){
		return $this->idrequisito;
	}

	public function setIdrequisito($idrequisito){
		$this->idrequisito = $idrequisito;
	}

	public function getDescri_persona(){
		return $this->descri_persona;
	}

	public function setDescri_persona($descri_persona){
		$this->descri_persona = $descri_persona;
	}

	public function getDescri_requisito(){
		return $this->descri_requisito;
	}

	public function setDescri_requisito($descri_requisito){
		$this->descri_requisito = $descri_requisito;
	}

	public function getEstado(){
		return $this->estado;
	}

	public function setEstado($estado){
		$this->estado = $estado;
	}

	public function getFechacompletado(){
		return $this->fechacompletado;
	}

	public function setFechacompletado($fechacompletado){
		$this->fechacompletado = $fechacompletado;
	}

	public function getModificable(){
		return $this->modificable;
	}

	public function setModificable($modificable){
		$this->modificable = $modificable;
	}

}

?>
