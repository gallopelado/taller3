<?php

class FichaBautismo {

  private $op;
  private $idbautismo;
  private $fechabautismo;
  private $fechacreacion;
  private $idtutor1;
  private $idtutor2;
  private $idpersona;
  private $idpastor;

  public function getOp(){
		return $this->op;
	}

	public function setOp($op){
		$this->op = $op;
	}

	public function getIdbautismo(){
		return $this->idbautismo;
	}

	public function setIdbautismo($idbautismo){
		$this->idbautismo = $idbautismo;
	}

	public function getFechabautismo(){
		return $this->fechabautismo;
	}

	public function setFechabautismo($fechabautismo){
		$this->fechabautismo = $fechabautismo;
	}

	public function getFechacreacion(){
		return $this->fechacreacion;
	}

	public function setFechacreacion($fechacreacion){
		$this->fechacreacion = $fechacreacion;
	}

	public function getIdtutor1(){
		return $this->idtutor1;
	}

	public function setIdtutor1($idtutor1){
		$this->idtutor1 = $idtutor1;
	}

	public function getIdtutor2(){
		return $this->idtutor2;
	}

	public function setIdtutor2($idtutor2){
		$this->idtutor2 = $idtutor2;
	}

	public function getIdpersona(){
		return $this->idpersona;
	}

	public function setIdpersona($idpersona){
		$this->idpersona = $idpersona;
	}

	public function getIdpastor(){
		return $this->idpastor;
	}

	public function setIdpastor($idpastor){
		$this->idpastor = $idpastor;
	}

}

?>
