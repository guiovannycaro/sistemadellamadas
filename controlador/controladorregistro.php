<?php

require("db/coneccion.php");
require("modelo/modeloregistro.php");
$querys = new consultasRegistro;

class controlador_registro {

    private $modelregistro;

    function __construct() {
        $this->modelregistro = new consultasRegistro();
    }

    function index() {
        require_once 'vista/registros/index.php';
    }

    public function Crud() {
        $Registro = new Registro();

        if (isset($_REQUEST['id'])) {
            $Registro = $this->modelregistro->Obtener($_REQUEST['id']);
        }

        require_once 'vista/registros/actualizar.php';
    }

    public function Guardar() {
        $Registro = new Registro();


        $Registro->id = $_REQUEST['id'];
        $Registro->iduentrante = $_REQUEST['usuario1'];
        $Registro->idusaliente = $_REQUEST['usuario2'];
        $Registro->idguion = $_REQUEST['guion'];
        $Registro->fechahora = $_REQUEST['fechahora'];
        $Registro->duracion = $_REQUEST['duracion'];



        $Registro->id > 0 ? $this->modelregistro->Actualizar($Registro) : $this->modelregistro->Registrar($Registro);

        if ($Registro->id <= 0) {
            $menssage = "no se puedo insertar el registro";
        } else {

            $menssage = "se inserto el registro";
        }
        return $menssage;
    }

    public function Eliminar() {
        $this->modelregistro->Eliminar($_REQUEST['id']);
        header('Location: index.php');
    }

}

?>