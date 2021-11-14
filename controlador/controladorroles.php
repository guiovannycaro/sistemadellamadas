<?php

require("db/coneccion.php");
require("modelo/modelorol.php");
$querys = new consultasRoles;

class controlador_roles {

    private $modelroles;

    function __construct() {
        $this->modelroles = new consultasRoles();
    }

    function index() {
        require_once 'vista/roles/index.php';
    }

    public function Crud() {
        $Roles = new Roles();

        if (isset($_REQUEST['id'])) {
            $Roles = $this->modelroles->Obtener($_REQUEST['id']);
        }

        require_once 'vista/roles/actualizar.php';
    }

    public function Guardar() {
        $Roles = new Roles();


        $Roles->id = $_REQUEST['id'];
        $Roles->rol = $_REQUEST['nombre'];
        $Roles->descripcion = $_REQUEST['descripcion'];

        $Guion->id > 0 ? $this->modelroles->Actualizar($Roles) : $this->modelroles->Registrar($Roles);

        if ($Roles->id <= 0) {
            $menssage = "no se puedo insertar el registro";
        } else {

            $menssage = "se inserto el registro";
        }
        return $menssage;
    }

    public function Eliminar() {
        $this->modelroles->Eliminar($_REQUEST['id']);
        header('Location: index.php');
    }

}

?>