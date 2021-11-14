<?php

require("db/coneccion.php");
require("modelo/modelousalientes.php");
$querys = new consultas;

class controlador_sistema {

    private $modelsalientes;

    function __construct() {
        $this->modelsalientes = new consultas();
    }

    function index() {
        require_once 'vista/usalientes/index.php';
    }

    public function Crud() {
        $Usuarios = new Usuarios();

        if (isset($_REQUEST['id'])) {
            $Usuarios = $this->modelsalientes->Obtener($_REQUEST['id']);
        }

        require_once 'vista/usalientes/actualizar.php';
    }

    public function Guardar() {
        $Usuarios = new Usuarios();


        $Usuarios->id = $_REQUEST['id'];
        $Usuarios->nombres = $_REQUEST['nombre'];
        $Usuarios->apellidos = $_REQUEST['apellido'];
        $Usuarios->idrol = $_REQUEST['rol'];
        $Usuarios->correo = $_REQUEST['correo'];


        $Usuarios->id > 0 ? $this->modelsalientes->Actualizar($Usuarios) : $this->modelsalientes->Registrar($Usuarios);

        if ($Usuarios->id <= 0) {
            $menssage = "no se puedo insertar el registro";
        } else {

            $menssage = "se inserto el registro";
        }
        return $menssage;
    }

    public function Eliminar() {
        $this->modelsalientes->Eliminar($_REQUEST['id']);
        header('Location: index.php');
    }

}

?>