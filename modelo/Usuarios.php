<?php

class Usuarios {

    public $id;
    public $nombres;
    public $apellidos;
    public $usuario;
    public $clave;
    public $idrol;
    public $correo;

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

    public function getUsuario() {
        return $this->usuario;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function getClave() {
        return $this->clave;
    }

    public function setClave($clave) {
        $this->clave = $clave;
    }

    public function getIdRol() {
        return $this->idrol;
    }

    public function setIdrol($idrol) {
        $this->idrol = $idrol;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

}

?>