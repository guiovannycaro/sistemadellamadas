<?php

require("db/coneccion.php");
require("modelo/modelousuarios.php");
$querys = new consultas;

class controlador_sistema {

    private $modelentrante;

    function __construct() {
        $this->modelentrante = new consultas();
    }

    function index() {
        require_once 'vista/usuarios/index.php';
    }

    public function Crud() {
        $Usuarios = new Usuarios();

        if (isset($_REQUEST['id'])) {
            $Usuarios = $this->modelentrante->Obtener($_REQUEST['id']);
        }

        require_once 'vista/usuarios/actualizar.php';
    }

    public function Guardar() {
        $Usuarios = new Usuarios();


        $Usuarios->id = $_REQUEST['id'];
        $Usuarios->nombres = $_REQUEST['nombre'];
        $Usuarios->apellidos = $_REQUEST['apellido'];
        $Usuarios->usuario = $_REQUEST['usuario'];
        $Usuarios->clave = $_REQUEST['clave'];
        $Usuarios->idrol = $_REQUEST['rol'];
        $Usuarios->correo = $_REQUEST['correo'];


        $Usuarios->id > 0 ? $this->modelentrante->Actualizar($Usuarios) : $this->modelentrante->Registrar($Usuarios);

        if ($Usuarios->id <= 0) {
            $menssage = "no se puedo insertar el registro";
        } else {

            $menssage = "se inserto el registro";
        }
        return $menssage;
    }

    public function Eliminar() {
        $this->modelentrante->Eliminar($_REQUEST['id']);
        header('Location: index.php');
    }

}

?>