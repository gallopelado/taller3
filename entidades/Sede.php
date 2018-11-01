<?php

class Sede {
    private $op;
    private $id;
    private $nombre;
    private $ruc;
    private $telefono1;
    private $telefono2;
    private $email;
    private $pagweb;
    private $fanpage;
    private $capacidad;
    private $latitud;
    private $longitud;
    private $idciudad;
    private $idbarrio;
    private $idcalle;

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

	public function getRuc(){
		return $this->ruc;
	}

	public function setRuc($ruc){
		$this->ruc = $ruc;
	}

	public function getTelefono1(){
		return $this->telefono1;
	}

	public function setTelefono1($telefono1){
		$this->telefono1 = $telefono1;
	}

	public function getTelefono2(){
		return $this->telefono2;
	}

	public function setTelefono2($telefono2){
		$this->telefono2 = $telefono2;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getPagweb(){
		return $this->pagweb;
	}

	public function setPagweb($pagweb){
		$this->pagweb = $pagweb;
	}

	public function getFanpage(){
		return $this->fanpage;
	}

	public function setFanpage($fanpage){
		$this->fanpage = $fanpage;
	}

	public function getCapacidad(){
		return $this->capacidad;
	}

	public function setCapacidad($capacidad){
		$this->capacidad = $capacidad;
	}

	public function getLatitud(){
		return $this->latitud;
	}

	public function setLatitud($latitud){
		$this->latitud = $latitud;
	}

	public function getLongitud(){
		return $this->longitud;
	}

	public function setLongitud($longitud){
		$this->longitud = $longitud;
	}

	public function getIdciudad(){
		return $this->idciudad;
	}

	public function setIdciudad($idciudad){
		$this->idciudad = $idciudad;
	}

	public function getIdbarrio(){
		return $this->idbarrio;
	}

	public function setIdbarrio($idbarrio){
		$this->idbarrio = $idbarrio;
	}

	public function getIdcalle(){
		return $this->idcalle;
	}

	public function setIdcalle($idcalle){
		$this->idcalle = $idcalle;
	}
}

?>