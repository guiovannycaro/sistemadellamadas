<?php

class Registro {

    public $id;
    public $nombres;
    public $apellidos;
    public $guion;
    public $nombrecliente;
    public $apellidocliente;
    public $fechahora;
    public $duracion;

    public function getId() {
        return $this->id;
    }

    public function setId(String $id) {
        $this->id;
    }

    public function getNombres() {
        return $this->Nombres;
    }

    public function setNombres(String $nombres) {
        $this->Nombres;
    }

    public function getApellidos() {
        return $this->apellidos;
    }

    public function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    public function getGuion() {
        return $this->guion;
    }

    public function setGuion(String $guion) {
        $this->guion;
    }

    public function getNombrescliente() {
        return $this->nombrecliente;
    }

    public function setNombrescliente(String $nombrecliente) {
        $this->nombrecliente;
    }

    public function getApellidoscliente() {
        return $this->apellidocliente;
    }

    public function setApellidoscliente($apellidocliente) {
        $this->apellidocliente = $apellidocliente;
    }

    public function getFechahora() {
        return $this->fechahora;
    }

    public function setFechahora(String $fechahora) {
        $this->fechahora;
    }

    public function getDuracion() {
        return $this->duracion;
    }

    public function setDuracion($duracion) {
        $this->duracion = $duracion;
    }

}

?>