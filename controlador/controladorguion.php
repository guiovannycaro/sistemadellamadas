<?php

require("db/coneccion.php");
require("modelo/modeloguion.php");
$querys = new consultasGuion;

class controlador_guion {

    private $modelguion;

    function __construct() {
        $this->modelguion = new consultasGuion();
    }

    function index() {
        require_once 'vista/guion/index.php';
    }

    public function Crud() {
        $Guion = new Guion();

        if (isset($_REQUEST['id'])) {
            $Guion = $this->modelguion->Obtener($_REQUEST['id']);
        }

        require_once 'vista/guion/actualizar.php';
    }

    public function Guardar() {
        $Guion = new Guion();


        $Guion->id = $_REQUEST['id'];
        $Guion->nombre = $_REQUEST['nombre'];
        $Guion->descripcion = $_REQUEST['descripcion'];
        $Guion->observacion = $_REQUEST['observacion'];



        $Guion->id > 0 ? $this->modelguion->Actualizar($Guion) : $this->modelguion->Registrar($Guion);

        if ($Guion->id <= 0) {
            $menssage = "no se puedo insertar el registro";
        } else {

            $menssage = "se inserto el registro";
        }
        return $menssage;
    }

    public function Eliminar() {
        $this->modelguion->Eliminar($_REQUEST['id']);
        header('Location: index.php');
    }

}

?>