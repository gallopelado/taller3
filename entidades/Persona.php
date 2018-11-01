<?php

class Persona {
  private $op;
  private $id;
  private $nombres;
  private $apellidoPaterno;
  private $apellidoMaterno;
  private $idfamilia;
  private $relacionfamiliar;
  private $sexo;
  private $idcalle;
  private $idciudad;
  private $codigopostal;
  private $idbarrio;
  private $estadopersonal;
  private $email;
  private $fechanac;
  private $lugarnac;
  private $estadocivil;
  private $idnacionalidad;
  private $cedula;
  private $foto;
  private $idprofesion;
  private $lugartrabajo;
  private $puesto;
  private $tipsangre;
  private $alergias;
  private $capacidades;
  private $motivosalida;
  private $fechasalida;

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

	public function getNombres(){
		return $this->nombres;
	}

	public function setNombres($nombres){
		$this->nombres = $nombres;
	}

	public function getApellidoPaterno(){
		return $this->apellidoPaterno;
	}

	public function setApellidoPaterno($apellidoPaterno){
		$this->apellidoPaterno = $apellidoPaterno;
	}

	public function getApellidoMaterno(){
		return $this->apellidoMaterno;
	}

	public function setApellidoMaterno($apellidoMaterno){
		$this->apellidoMaterno = $apellidoMaterno;
	}

	public function getIdfamilia(){
		return $this->idfamilia;
	}

	public function setIdfamilia($idfamilia){
		$this->idfamilia = $idfamilia;
	}

	public function getRelacionfamiliar(){
		return $this->relacionfamiliar;
	}

	public function setRelacionfamiliar($relacionfamiliar){
		$this->relacionfamiliar = $relacionfamiliar;
	}

	public function getSexo(){
		return $this->sexo;
	}

	public function setSexo($sexo){
		$this->sexo = $sexo;
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

	public function getCodigopostal(){
		return $this->codigopostal;
	}

	public function setCodigopostal($codigopostal){
		$this->codigopostal = $codigopostal;
	}

	public function getIdbarrio(){
		return $this->idbarrio;
	}

	public function setIdbarrio($idbarrio){
		$this->idbarrio = $idbarrio;
	}

	public function getEstadopersonal(){
		return $this->estadopersonal;
	}

	public function setEstadopersonal($estadopersonal){
		$this->estadopersonal = $estadopersonal;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getFechanac(){
		return $this->fechanac;
	}

	public function setFechanac($fechanac){
		$this->fechanac = $fechanac;
	}

	public function getLugarnac(){
		return $this->lugarnac;
	}

	public function setLugarnac($lugarnac){
		$this->lugarnac = $lugarnac;
	}

	public function getEstadocivil(){
		return $this->estadocivil;
	}

	public function setEstadocivil($estadocivil){
		$this->estadocivil = $estadocivil;
	}

	public function getIdnacionalidad(){
		return $this->idnacionalidad;
	}

	public function setIdnacionalidad($idnacionalidad){
		$this->idnacionalidad = $idnacionalidad;
	}

	public function getCedula(){
		return $this->cedula;
	}

	public function setCedula($cedula){
		$this->cedula = $cedula;
	}

	public function getFoto(){
		return $this->foto;
	}

	public function setFoto($foto){
		$this->foto = $foto;
	}

	public function getIdprofesion(){
		return $this->idprofesion;
	}

	public function setIdprofesion($idprofesion){
		$this->idprofesion = $idprofesion;
	}

	public function getLugartrabajo(){
		return $this->lugartrabajo;
	}

	public function setLugartrabajo($lugartrabajo){
		$this->lugartrabajo = $lugartrabajo;
	}

	public function getPuesto(){
		return $this->puesto;
	}

	public function setPuesto($puesto){
		$this->puesto = $puesto;
	}

	public function getTipsangre(){
		return $this->tipsangre;
	}

	public function setTipsangre($tipsangre){
		$this->tipsangre = $tipsangre;
	}

	public function getAlergias(){
		return $this->alergias;
	}

	public function setAlergias($alergias){
		$this->alergias = $alergias;
	}

	public function getCapacidades(){
		return $this->capacidades;
	}

	public function setCapacidades($capacidades){
		$this->capacidades = $capacidades;
	}

  public function getMotivosalida(){
		return $this->motivosalida;
	}

	public function setMotivosalida($motivosalida){
		$this->motivosalida = $motivosalida;
	}

  public function getFechasalida(){
		return $this->fechasalida;
	}

	public function setFechasalida($fechasalida){
		$this->fechasalida = $fechasalida;
	}
}
?>
