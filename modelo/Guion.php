<?php

class Guion {

    public $id;
    public $nombre;
    public $descripcion;
    public $observacion;

    public function getId() {
        return $this->id;
    }

    public function setId(String $id) {
        $this->id;
    }

    public function getNombres() {
        return $this->Nombre;
    }

    public function setNombre(String $nombre) {
        $this->Nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getObservacion() {
        return $this->observacion;
    }

    public function setObservacion($observacion) {
        $this->observacion = $observacion;
    }

}

?>